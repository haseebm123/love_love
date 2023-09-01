<div id="users-list" class="chat-user-list list-group position-relative">

                            <ul class="chat-users-list-wrapper media-list text-center">
                                @php 
                                 $payments = \App\Models\PaymentDetails::get();
                                @endphp
                                @if(count($payments)>0)
                                @foreach($payments as $item)
                                <li>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">$ {{$item->amount??null}} has been credtied in the Account</h5>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                                
                            </ul>



                        </div>
