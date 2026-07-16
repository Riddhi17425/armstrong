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

</style>

<div class="modal fade modal_home_video" id="autoOpenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: transparent; border: none;">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" 
                        style="position: absolute; right: 15px; top: 15px; z-index: 999; filter: invert(1) !important; opacity:1;"></button>
                
                  <img src="{{ asset('public/front/images/home-modal.png')}}" alt="Armstrong Event Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Check if we are on the homepage
        const currentPath = window.location.pathname;
        const isHomepage = currentPath === '/' || 
                           currentPath === '/home' || 
                           currentPath === '' ||
                           currentPath === '{{ url("/") }}';

        if (isHomepage) {
            
            // Wait 2 seconds then open the modal
            setTimeout(function () {
                
                const modalElement = document.getElementById('autoOpenModal');
                
                if (modalElement) {
                    const myModal = new bootstrap.Modal(modalElement, {
                        backdrop: true,     // Allows closing when clicking outside
                        keyboard: true      // Allows closing with ESC key
                    });
                    
                    myModal.show();
                }
            }, 2000); // 2 seconds delay
        }
    });
</script>