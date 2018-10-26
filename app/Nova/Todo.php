<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Froala\NovaFroalaField\Froala;




class Todo extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = 'App\Todo';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'short_description';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'description', 'short_description'
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
            Text::make( 'Short Description',  'short_description')
                ->rules('required')
                ->sortable()->asHtml()
            ,
            Froala::make('Description')->withFiles('public')->showOnIndex(),

            Select::make( 'Status',  'status')
                ->rules('required')
                ->sortable()
                ->options([
                    'New' => 'New',
                    'Work In Progress' => 'Work In Progress',
                    'On-Hold' => 'On-Hold',
                    'Closed' => 'Closed',
                    'Cancell' => 'Cancell',
                ])
            ,
            Froala::make('Notes')->withFiles('public')->showOnIndex(),
            BelongsTo::make('Meeting')
                ->rules('required')
                ->searchable()
                ->sortable()
            ,
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
        return [
            new Actions\UpdateTodoStatus(),
        ];
    }
}
