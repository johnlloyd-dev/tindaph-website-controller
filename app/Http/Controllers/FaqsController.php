<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;
use App\Http\Requests\FaqsPostRequest;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Faqs::orderby('id', 'asc')->get();

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqsPostRequest $faqsRequest, Faqs $faqs)
    {
        $posting = $faqs::create($faqsRequest->all());
        return response()->json(['message' => 'Faq has been sucessfully saved', 'data' => $posting]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(FaqsPostRequest $faqsRequest, $id)
    {
        try {
            $faqs = Faqs::find($id);
            $posting = $faqs->update($faqsRequest->all());
            return response()->json(['message' => 'Faqs has been sucessfully saved', 'data' => $posting]);
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faqs::find($id);
        $faqs->delete();
        return response()->json(['message' => 'Testimony has been sucessfully deleted']);
    }
}
