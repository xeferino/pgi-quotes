<?php

namespace App\Http\Controllers;

use App\ModelPerson;
use App\ModelQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuoteController extends Controller
{
    public function createQuote()
    {
        $persons = ModelPerson::all();
        return view('procesos.quote.create-quote', compact('persons'));
    }

    public function saveQuote(Request $data)
    {
        ModelQuote::create([
            'persons_id' => $data->persona,
            'title' => $data->title,
            'description' => $data->description,
            'type' => $data->type,
            'observation' => $data->observation,
            'date' => $data->date,
            'status' => 0,
        ]);
        return redirect('/dash/quote/list');
    }

    public function listQuote()
    {
        $quotes = DB::table('quotes')
            ->leftjoin('persons', 'quotes.persons_id', '=', 'persons.id')
            ->select('quotes.*', 'persons.fullnames', 'persons.email', 'persons.phone')
            ->orderBy('quotes.id', 'DESC')
            ->get();

        $persons = ModelPerson::all();

        return view('procesos.quote.list-quotes', compact('quotes', 'persons'));
    }

    public function getQuoteAjax($id)
    {
        $quotes = DB::table('quotes')
            ->leftjoin('persons', 'quotes.persons_id', '=', 'persons.id')
            ->select('quotes.*', 'persons.fullnames', 'persons.email', 'persons.phone')
            ->where('quotes.id', $id)
            ->orderBy('quotes.id', 'DESC')
            ->get();

        $persons = ModelPerson::all();

        $quote_find = null;

        if (!empty($quotes)) {
            $quote_find = $quotes;
        } else {
            $quote_find = 0;
        }

        return json_encode(["quote" => $quote_find]);
    }

    public function editQuoteAjax(Request $request, $id)
    {
        $quote = ModelQuote::find($id);

        if (!empty($quote)) {
            $quote->persons_id = $request->persons_id;
            $quote->title = $request->title;
            $quote->description = $request->description;
            $quote->type = $request->type;
            $quote->date = $request->date;
            $quote->observation = $request->observation;
            $quote->status = ($request->status == 0) ? 0 : 1;
            $quote->save();
            return json_encode(1);
        } else {
            return json_encode(0);
        }
    }

    public function deleteQuoteAjax($id)
    {
        $quote = ModelQuote::find($id);
        if (!empty($quote)) {
            $delete = $quote->delete();
            if ($delete) {
                return json_encode(1);
            } else {
                return json_encode(0);
            }
        } else {
            return json_encode(0);
        }
    }

    public function getQuotesAjaxCalendar(Request $request)
    {
        $quotes = DB::table('quotes')->select('quotes.date')->where('quotes.status', '0')->orderBy('quotes.id', 'DESC')->get();

        if (count($quotes) > 0) {
            $date = [];
            foreach ($quotes as $quote) {
                $f = date('Y-m-d', strtotime($quote->date));
                array_push($date, [
                    "date" => $f,
                    "badge" => true,
                    "title" => "Citas Programadas",
                ]);
            }
            return json_encode($date);
        } else {
            return json_encode(0);
        }

    }

    public function getQuotesAjax(Request $request, $date)
    {
        $quotes = DB::table('quotes')
            ->leftjoin('persons', 'quotes.persons_id', '=', 'persons.id')
            ->select('quotes.*', 'persons.fullnames', 'persons.email', 'persons.phone')
            ->where('quotes.status', '0')
            ->where('quotes.date', 'LIKE', '%' . $date . '%')
            ->orderBy('quotes.id', 'DESC')
            ->get();

        if (count($quotes) > 0) {
            return json_encode(["quotes" => $quotes]);
        } else {
            return json_encode(0);
        }
    }

    public function getQuoteAjaxPerson(Request $request)
    {
        $persons = ModelPerson::all();
        if (count($persons) > 0) {
            return json_encode(["persons" => $persons]);
        } else {
            return json_encode(0);
        }
    }

    public function getQuoteAjaxSave(Request $data)
    {
        $f1 = date('Y-m-d', strtotime($data->date));
        $f2 = date('Y-m-d');
        if ($f1 >= $f2) {
            $exists = DB::table('quotes')
                ->select('quotes.date')
                ->where('quotes.status', '0')
                ->where('quotes.date', 'LIKE', '%' . $f1 . '%')
                ->count();

            $quote = ModelQuote::create([
                'persons_id' => $data->persona,
                'title' => $data->title,
                'description' => $data->description,
                'type' => $data->type,
                'observation' => $data->observation,
                'date' => $data->date,
                'status' => 0,
            ]);

            if ($quote) {
                if ($exists == 0) {
                    return json_encode(1);
                } else {
                    return json_encode(2);
                }
            } else {
                return json_encode(0);
            }
        } else {
            return json_encode(3);
        }
    }

}
