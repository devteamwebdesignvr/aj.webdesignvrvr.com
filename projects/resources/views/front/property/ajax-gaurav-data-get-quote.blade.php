   @php
        $guestyapi=$main_data['guestyapi'];
        $start_date=$main_data["start_date"];
        $end_date=$main_data["end_date"];
        $adults=$main_data["adults"];
        $child=$main_data["child"];
        $total_guests=$adults+$child;
        if(isset($guestyapi['data']['rates']['ratePlans'])){            
            if(isset($guestyapi['data']['rates']['ratePlans'][0])){
                if(isset($guestyapi['data']['rates']['ratePlans'][0]['ratePlan'])){               
                    if(isset($guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['money'])){
                        $moneyData=$guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['money'];
                        $rate_api_id=$guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['money']['_id'];
                        $gross_amount=$moneyData['fareAccommodation'];
                        $sub_total=$moneyData['subTotalPrice'];
                        $total_amount=$moneyData['hostPayout'];
                        $taxes=$moneyData['totalTaxes'];
                        $before_total_fees=$moneyData['invoiceItems'];
                        $quote_id=$guestyapi['data']['_id'];
                    }else{
                        @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
                    }
                }else{
                    @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
                }
            }else{
                @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
            }
        }else{
            @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
        }
        $total_guests=$main_data["adults"]+$main_data["childs"];
        $gross_amount=$gross_amount;
        $tax=0;
        $now = strtotime($start_date); 
        $your_date = strtotime($end_date);
        $datediff =  $your_date-$now;
        $day= ceil($datediff / (60 * 60 * 24));
        $total_night=$day;
        $after_total_fees=[];
        $pet_fee=0;
        $total_pets=0;
        $amount_data=[];
        $total_payment=$total_amount;
        $after_total_fees=[];
        $define_tax=0;
        
        foreach($before_total_fees as $b){
            if($b['type']=="ACCOMMODATION_FARE"){               
            } else if($b['type']=="CLEANING_FEE"){                
            } elseif($b['type']!="TAX"){
                if($b['normalType']=="AFE"){
                    $type='DAMAGE_WAIVER';
                }else{
                    $type=$b['type'];
                }
               /*   if($type == 'DAMAGE_WAIVER'){
                       $before_total_fees[] = [
                                "title" => $b['title'] . "(".str_replace("_"," ",$type).")",
                                "amount" => $b['amount'],
                                "normalType" => $b['normalType'],
                                "secondIdentifier" => $type,
                            ];
                        $total_amount += $b['amount'];
                   }*/
            }
        }
    @endphp
   @foreach($before_total_fees as $c)
           

                  <div class="row">
            <div class="col-md-6">
                {{str_replace("_"," ",$c['title']) }}
            </div>
            <div class="col-md-6">
               {!! $setting_data['payment_currency'] !!} {{number_format($c['amount'],2)}}
            </div>
        </div>
            @endforeach


           
        
<div class="row">
    <div class="col-md-6">
        Total 
    </div>
    <div class="col-md-6">
       {!! $setting_data['payment_currency'] !!} {{number_format($total_amount,2)}}
    </div>
</div>