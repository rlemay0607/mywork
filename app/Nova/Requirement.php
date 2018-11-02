<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use Froala\NovaFroalaField\Froala;

class Requirement extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Requirement';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'short_description';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'short_description', 'priority', 'type', 'state', 'points', 'classification',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex()->hideFromDetail()->hideWhenCreating()->hideWhenUpdating(),
            Text::make('Short Description')->asHtml(),

            Select::make( 'Type',  'type')
                ->rules('required')
                ->sortable()
                ->options([
                    'Development' => 'Development',
                    'Documentation' => 'Documentation',

                ])
            ,
            Select::make( 'Priority',  'priority')
                ->rules('required')
                ->sortable()
                ->options([
                    '1-Critical' => '1-Critical',
                    '2-High' => '2-High',
                    '3-Medium' => '3-Medium',
                    '4-Low' => '4-Low',
                ]),
            Select::make( 'State',  'state')
                ->rules('required')
                ->sortable()
                ->options([
                    'Draft' => 'Draft',
                    'Ready' => 'Ready',
                    'Work In Progress' => 'Work In Progress',
                    'Ready For Testing' => 'Ready For Testing',
                    'Complete' => 'Complete',
                    'Cancelled' => 'Cancelled',
                ]),
            BelongsTo::make('Module')->searchable(),
            Number::make('Points')->min(1)->max(1000)->step(1),
            Select::make( 'Classification',  'classification')
                ->sortable()
                ->options([
                    'Feature' => 'Feature',
                    'Defect' => 'Defect',

                ]),
            Froala::make('Description')->withFiles('public')->showOnIndex(),
            Froala::make('Acceptance Criteria')->withFiles('public')->showOnIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
