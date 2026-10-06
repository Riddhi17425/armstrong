<style>

.modal_home_video .modal-backdrop.show {
    opacity: 0.7 !important;
    backdrop-filter: blur(5px); 
    transition: opacity 0.4s ease;
}


.modal_home_video.fade .modal-dialog {
    transform: translateY(30px) scale(0.95); 
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    opacity: 0;
}

.modal_home_video.show .modal-dialog {
    transform: translateY(0) scale(1);
    opacity: 1;
}


.modal_home_video .promoVideo {
    display: block;
    border-radius: 12px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    opacity: 0;
    transition: opacity 0.8s ease-in-out; 
}

.modal_home_video .promoVideo.video-ready {
    opacity: 1;
    border:2px solid white;
}
.btn-close{
    height:10px!important;
    width:10px!important;
    
}

 .modal_home_video .btn-close-white
    {
        position: absolute; right: 31px; top: 41px; z-index: 999; filter: invert(0) !important; opacity:1;
    }


@media (max-width:769px)
{
    
    .modal_home_video .btn-close-white
    {
        right: 20px; top: 30px;
    }
    
    
}

</style>

<div class="modal fade modal_home_video" id="autoOpenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: transparent; border: none;">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" 
                        ></button>
                
                  <img src="{{ asset('public/front/images/home-event-modal.jpg')}}" alt="Armstrong Event Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Check if we are on the homepage
        const currentPath = window.location.pathname;
        const isHomepage = currentPath === '/' || 
                           currentPath === '/home' || 
                           currentPath === '' ||
                           currentPath === '/armstrong/' ||
                           currentPath === '{{ url("/") }}';

        if (isHomepage) {
            // Wait 2 seconds then open the modal
            setTimeout(function () {
                
                const modalElement = document.getElementById('autoOpenModal');
                console.log("entered");
                if (modalElement) {
                    console.log("entered 2");
                    const myModal = new bootstrap.Modal(modalElement, {
                        backdrop: true,     // Allows closing when clicking outside
                        keyboard: true      // Allows closing with ESC key
                    });
                    
                    myModal.show();
                }
            }, 2000); // 2 seconds delay
        }
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Check if we are on the homepage
        const currentPath = window.location.pathname;
        const isHomepage = currentPath === '/' ||
                           currentPath === '/home' ||
                           currentPath === '' ||
                           currentPath === '{{ url("/") }}';

        if (isHomepage) {

            // Wait 2 seconds then try to open the modal
            setTimeout(function () {

                // Check 1: Koi bhi Bootstrap modal pehle se open hai?
                if (document.querySelector('.modal.show')) {
                    return;
                }

                // Check 2: WhatsApp popup open hai?
                // '.whatsapp-popup' ki jagah apni asli class/id likhni hai
                const whatsappPopup = document.querySelector('.whatsapp-popup');
                if (whatsappPopup && whatsappPopup.offsetParent !== null) {
                    return;
                }

                // Check 3: User kisi input/textarea me type kar raha hai?
                const active = document.activeElement;
                if (active && (active.tagName === 'INPUT' || active.tagName === 'TEXTAREA')) {
                    return;
                }

                // Sab check pass -> image modal kholo
                const modalElement = document.getElementById('autoOpenModal');
                if (modalElement) {
                    const myModal = new bootstrap.Modal(modalElement, {
                        backdrop: true,
                        keyboard: true
                    });
                    myModal.show();
                }

            }, 2000); // 2 seconds delay
        }
    });
</script>