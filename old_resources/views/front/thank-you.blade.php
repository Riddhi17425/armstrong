@include('layouts.frontheader')
<section class="mt-80">
    <div class="container">
        <div class="text-center">
            <span> <img class=" img-fluid" src="{{asset('public/front/img/thankyou.png')}}" alt="thank you"></span> <br />
            <h2 class="main_head head_wrapper mb-3">Thank You</h2> <br/>
            <P class="pb-4">We appreciate your time for filling in the details! Our experts will get back to you with the best solution for your business.</P>
            
            
            
            <a class="sub_btn" href="{{url('/')}}"><svg width="28" height="14" viewBox="0 0 28 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.71029 12.2085L1.50196 7.00016M1.50196 7.00016L6.71029 1.79183M1.50196 7.00016H26.502"
                        stroke="white" stroke-width="2.08333" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="ms-2"> Go To home</span>
               </a>
        </div>
    </div>
</section>
@include('layouts.frontfooter')