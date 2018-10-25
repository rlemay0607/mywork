<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;


class Company extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = 'App\Company';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name', 'address', 'city', 'state', 'zip_code'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            Text::make( 'Name',  'name')
            ->rules('required')->sortable()
,
            Avatar::make( 'Logo',  'logo')
                ->rules('required')
                ->sortable()
                ->disk('public')
                ->prunable()
            ,
                                                                Text::make( 'Address',  'address')
->rules('required')
->sortable()
,
                                                                Text::make( 'City',  'city')
->rules('required')
->sortable()
,
                                                                Text::make( 'State',  'state')
->rules('required')
->sortable()
,
                                                                Text::make( 'Zip Code',  'zip_code')
->rules('required')
->sortable()
,

            HasMany::make('Users'),
            HasMany::make('Meetings'),
                                                                                            ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
