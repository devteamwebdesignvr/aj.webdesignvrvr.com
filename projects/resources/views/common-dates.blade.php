<div class="row no-gutters">
		    @php
		    

   function getSinglePropertyRate($date,$property){
            
            return 0;
    }
    
    function getcolorData($date,$property){
      
        return 'red';
    }
    
    
		        $property=App\Models\Guesty\GuestyProperty::Find(Request::get("id"));
		    @endphp
		    @if($property)
		    @php
                $new_data_blocked=LiveCart::iCalDataCheckInCheckOut(Request::get("id"));
               // $unavailable_dates=App\Models\Guesty\GuestyAvailablityPrice::where(["listingId"=>$property->_id])->whereIn("status",["unavailable"])->get();
                $un_dates=[];
             
                    $checkin=$new_data_blocked['checkin'];
                    
                    $checkout=$new_data_blocked['checkout'];


                $payment_currency= $setting_data['payment_currency'];
                function getWeekday($date1) {
                    return date('w', strtotime($date1));
                }
                $date=date('d-m-Y');
                
                $current_date=date('d');
                
                
                
                $current_month=date('m',strtotime($date));
                $current_month_name=date('F',strtotime($date));
                $current_year=date('Y',strtotime($date));
                
                
                $current_last_date=date('t',strtotime($date));
                $current_no_of_days= cal_days_in_month(CAL_GREGORIAN,$current_month, $current_year);
                
                $current_day_name=getWeekday(date('01-'.$current_month.'-'.$current_year));
                
                //dd($date);
                if(Request::get("date")){
                    $date=date('01-m-Y',strtotime(Request::get("date")));
                }
                
                if(Request::get("operation")){
                    if(Request::get("operation")=="minus"){
                        $date=date('01-m-Y',strtotime('-1 month',strtotime($date)));
                    }if(Request::get("operation")=="plus"){
                        $date=date('01-m-Y',strtotime('+1 month',strtotime($date)));
                    }else{
                        $date=date('01-m-Y',strtotime($date));
                    }
                }
                
                
                $first_date=date('d',strtotime($date));
                $first_month=date('m',strtotime($date));
                $first_month_name=date('F',strtotime($date));
                $first_year=date('Y',strtotime($date));
                
                
                $first_last_date=date('t',strtotime($date));
                $first_no_of_days= cal_days_in_month(CAL_GREGORIAN,$first_month, $first_year);
                
                $first_day_name=getWeekday(date('01-'.$first_month.'-'.$first_year));
                
                
                $second_month=date('m',strtotime('+1 month',strtotime($date)));
                $second_month_name=date('F',strtotime('+1 month',strtotime($date)));
                $second_year=date('Y',strtotime('+1 month',strtotime($date)));
                
                
                $second_last_date=date('t',strtotime('+1 month',strtotime($date)));
                $second_no_of_days= cal_days_in_month(CAL_GREGORIAN,$second_month, $second_year);
                
                $second_day_name=getWeekday(date('01-'.$second_month.'-'.$second_year));
                
                @endphp
			<div class="col-md-6">
				<div class="calendar calendar-first" id="calendar_first">
					<div class="calendar_header">
					    @if($current_month.''.$current_year!=$first_month.''.$first_year  )
						<button class="switch-month switch-left"  data-date="{{ $date }}">
						<i class="fa fa-chevron-left"></i>
						</button>
						@endif
						<h2>{{ $first_month_name }} {{ $first_year }}</h2>
						<button class="switch-month switch-right">
						<i class="fa fa-chevron-right"></i>
						</button>
					</div>
					<div class="calendar_weekdays">
					    <div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thu</div>
						<div>Fri</div>
						<div>Sat</div>
					
					</div>
					<div class="calendar_content">
					    @php $k=0; @endphp
					    @for($i=0;$i<$first_day_name;$i++)
						<div class="blank"></div>
						@php $k++; @endphp
						@endfor
						@for($i=1;$i<=$first_no_of_days;$i++)
						   @php
						   $class="";
						   
						   if($current_month.''.$current_year==$first_month.''.$first_year){
						        if((int)$current_date>$i){
						            $class="disabled-date";
						            $price='';
						        }else{
						            
                                    $i1=$i<10?'0'.$i:$i;
                                    $new_date=$first_year.'-'.$first_month.'-'.$i1;
                                    $price='<span>'.$payment_currency.''.getSinglePropertyRate($new_date,$property).'</span>';
                                     if(in_array($new_date,$checkin)){
                                        $class.=" check-out-blocked ".getcolorData($new_date,$property);
                                    }
                                    if(in_array($new_date,$checkout)){
                                        $class.=" check-in-blocked ".getcolorData($new_date,$property);
                                    }
                                    if(in_array($new_date,$un_dates)){
                                    	$class.=" check-in-blocked check-out-blocked ".getcolorData($new_date,$property);
                                    }
						         
						        }
						   }else{
						         
						        $i1=$i<10?'0'.$i:$i;
                                $new_date=$first_year.'-'.$first_month.'-'.$i1;
                                $price='<span>'.$payment_currency.''.getSinglePropertyRate($new_date,$property).'</span>';
                                 if(in_array($new_date,$checkin)){
                                    $class.=" check-out-blocked ".getcolorData($new_date,$property);
                                }
                                if(in_array($new_date,$checkout)){
                                    $class.=" check-in-blocked ".getcolorData($new_date,$property);
                                }
                                 if(in_array($new_date,$un_dates)){
                                    	$class.=" check-in-blocked check-out-blocked ".getcolorData($new_date,$property);
                                    }
						   }
						   
						   if($current_date.''.$current_month.''.$current_year==$i.''.$first_month.''.$first_year){
						        $class.=' current-date';
						        
						        
						        $i1=$i<10?'0'.$i:$i;
						        $new_date=$first_year.'-'.$first_month.'-'.$i1;
						         $price='<span>'.$payment_currency.''.getSinglePropertyRate($new_date,$property).'</span>';
						   }
						   @endphp
						    <div class="{{ $class }}">{{ $i }} {!! $price !!}</div>
						@php $k++; @endphp
						@endfor
						
						@for($i=$k;$i<42;$i++)
						<div class="blank"></div>
						@endfor
				
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="calendar calendar-second" id="calendar_second">
					<div class="calendar_header">
						<button class="switch-month switch-left">
						<i class="fa fa-chevron-left"></i>
						</button>
						<h2>{{ $second_month_name }} {{ $second_year }}</h2>
						<button class="switch-month switch-right" data-date="{{ $date }}">
						<i class="fa fa-chevron-right"></i>
						</button>
					</div>
					<div class="calendar_weekdays">
						<div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thu</div>
						<div>Fri</div>
						<div>Sat</div>
						
					</div>
					<div class="calendar_content">
					 @php $k=0; @endphp
						@for($i=0;$i<$second_day_name;$i++)
						<div class="blank"></div>
						@php $k++; @endphp
						@endfor
						@for($i=1;$i<=$second_no_of_days;$i++)
						    @php
						        $class='';
						        $i1=$i<10?'0'.$i:$i;
                                $new_date=$second_year.'-'.$second_month.'-'.$i1;
                                $price='<span>'.$payment_currency.''.getSinglePropertyRate($new_date,$property).'</span>';
                                if(in_array($new_date,$checkin)){
                                    $class.=" check-out-blocked ".getcolorData($new_date,$property);
                                }
                                if(in_array($new_date,$checkout)){
                                    $class.=" check-in-blocked ".getcolorData($new_date,$property);
                                }
                                 if(in_array($new_date,$un_dates)){
                                    	$class.=" check-in-blocked check-out-blocked ".getcolorData($new_date,$property);
                                    }
						    @endphp
						<div  class="{{ $class }}">{{ $i }}  {!! $price !!}</div>
						@php $k++; @endphp
						@endfor
						
						@for($i=$k;$i<42;$i++)
						<div class="blank"></div>
						
						@endfor
					</div>
				</div>
			</div>
			@endif
		</div>