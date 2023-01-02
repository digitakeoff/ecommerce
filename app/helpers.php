<?php
    use App\Models\City;
    use App\Models\State;

    function city($id){
        return City::find($id);
    }

    function state($id){
        return State::find($id);
    }

    function price($amt){
        return html_entity_decode(config('app.currency')) . number_format($amt);
    }
    
    function drivetrain($key){
        switch($key){
            case 'four-wd':
                return 'FOUR WHEEL';
                break;
            
            case 'two-wd':
                return 'TWO WHEEL';
                break;

            case 'awd':
                return 'ALL WHEEL';
                break;

            case 'fwd':
                return 'FRONT WHEEL';
                break;

            case 'rwd':
                return 'REAR WHEEL';
                break;
        }   
    }

    function condition($key){
        switch($key){
            case 'brand-new':
                return 'Brand new';
                break;
            
            case 'foreign-used':
                return 'Foreign used';
                break;

            case 'nigerian-used':
                return 'Nigerian used';
                break;

        }   
    }