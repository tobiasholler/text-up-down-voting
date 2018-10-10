<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TextController extends Controller {

    public function showRandomText() {
        $data = [ "text" => Text::randomText() ];
        return view("showtext", $data);
    }

    public function topList(Request $request) {
        if ($request->wantsJson()) {
            /** @var LengthAwarePaginator $texts */
            $texts = Text::orderByRaw("`upvotes` - `downvotes` DESC, `upvotes` DESC, `text` ASC")->paginate(15);
            foreach ($texts as $key=>$text) {
                $text->index = (($texts->currentPage()-1)*$texts->perPage()) + $key+1;
            }
            return response()->json($texts);
        }
        return view("toplist", [ "texts" => [] ]);
    }

    public function showText(int $id) {
        $data = [ "text" => Text::findOrFail($id) ];
        return view("index", $data);
    }

    public function upvote(Request $request) {
        /** @var Text $text */
        $text = Text::findOrFail($request->id);
        $text->setAttribute("upvotes", $text->getAttribute("upvotes")+1);
        $text->save();
        return redirect(route("show_random_text"));
    }

    public function downvote(Request $request) {
        /** @var Text $text */
        $text = Text::findOrFail($request->id);
        $text->setAttribute("downvotes", $text->getAttribute("downvotes")+1);
        $text->save();
        return redirect(route("show_random_text"));
    }

}
