<style>
    /* Cookie Consent Backdrop */
    .cookie-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
       
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cookie-backdrop.show {
        opacity: 1;
        visibility: visible;
    }

    /* Cookie Consent Dialog Styles */
    .cookie-consent {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: black;
        color: white;
        padding: 20px;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
        z-index: 10000;
        transform: translateY(100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cookie-consent.show {
        transform: translateY(0);
    }

    .cookie-consent-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .cookie-consent-text {
        flex: 1;
        min-width: 300px;
    }

    .cookie-consent-text p {
        margin: 0;
        font-size: 16px;
        line-height: 1.5;
        opacity: 0.95;
    }

    .cookie-consent-text a {
        color: #FFD65F;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
        cursor: pointer;
    }

    .cookie-consent-text a:hover {
        color: #FFD65F;
        text-decoration: underline;
    }

    .cookie-consent-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .cookie-btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 100px;
    }

    .cookie-btn:focus {
        outline: 2px solid rgba(255, 255, 255, 0.5);
        outline-offset: 2px;
    }

    .cookie-consent-container .accept-btn {
        background: #e41e29;
        color: white;
       
    }

    .cookie-consent-container .accept-btn:hover {
        background: #e41e29;
        transform: translateY(-2px);
     
    }

   .cookie-consent-container .reject-btn {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
     
    }

    .cookie-consent-container .reject-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    /* Cookie Policy Modal Styles */
    .cookie-policy-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.8);
        background: #1a1a1a;
        color: white;
        max-width: 800px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        z-index: 10001;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cookie-policy-modal.show {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, -50%) scale(1);
    }

    .cookie-policy-modal h2 {
        margin-top: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .cookie-policy-modal h3 {
        font-size: 18px;
        font-weight: 500;
        margin-top: 20px;
    }

    .cookie-policy-modal p {
        font-size: 16px;
        line-height: 1.6;
        opacity: 0.95;
        margin: 10px 0;
    }

    .cookie-policy-modal a {
        color: #ffd700;
        text-decoration: none;
    }

    .cookie-policy-modal a:hover {
        text-decoration: underline;
        color: #ffed4e;
    }

    .cookie-policy-modal ul {
        padding-left: 20px;
        margin: 10px 0;
    }

    .cookie-policy-modal li {
        margin-bottom: 10px;
    }

   .cookie-consent-container .close-modal-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        padding: 5px 10px;
    }

    .cookie-consent-container..close-modal-btn:hover {
        color: #ffd700;
    }

    @media (max-width: 768px) {
        .cookie-consent {
            padding: 16px;
        }
        
        .cookie-consent-container {
            flex-direction: column;
            gap: 16px;
            text-align: center;
        }
        
        .cookie-consent-text {
            min-width: auto;
        }
        
        .cookie-consent-text p {
            font-size: 14px;
        }
        
        .cookie-consent-actions {
            width: 100%;
            justify-content: center;
        }
        
        .cookie-btn {
            flex: 1;
            min-width: auto;
            font-size: 13px;
            padding: 10px 16px;
        }

        .cookie-policy-modal {
            width: 95%;
            padding: 20px;
        }

        .cookie-policy-modal h2 {
            font-size: 20px;
        }

        .cookie-policy-modal h3 {
            font-size: 16px;
        }

        .cookie-policy-modal p {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .cookie-consent-actions {
            flex-direction: column;
            width: 100%;
        }
        
        .cookie-btn {
            width: 100%;
        }

        .cookie-policy-modal {
            max-height: 90vh;
            padding: 15px;
        }
    }

    .cookie-consent-container .demo-content {
        max-width: 800px;
        margin: 0 auto;
    }

   .cookie-consent-container .demo-button {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px 5px;
    }

    .cookie-consent-container .demo-button:hover {
        background: #0056b3;
    }
</style>

<!-- Cookie Consent Backdrop -->
<div id="cookie-backdrop" class="cookie-backdrop"></div>

<!-- Cookie Consent Dialog -->
<div id="cookie-consent" class="cookie-consent">
    <div class="cookie-consent-container">
        <div class="cookie-consent-text">
            <p>
               
                We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. 
                <a href="#" id="cookie-policy-link">Learn more about our cookie policy</a>.
            </p>
        </div>
        <div class="cookie-consent-actions">
            <button id="accept-cookies" class="cookie-btn accept-btn">Accept All</button>
            <button id="reject-cookies" class="cookie-btn reject-btn">Reject All</button>
        </div>
    </div>
</div>

<!-- Cookie Policy Modal -->
<div id="cookie-policy-modal" class="cookie-policy-modal">
    <button class="close-modal-btn" id="close-policy-modal">×</button>
    <h2>Cookie Policy</h2>
    <!--<p><strong>Last updated: June 24, 2025</strong></p>-->
    
    <h3>Introduction</h3>
    <p>This Cookie Policy explains how we use cookies and similar technologies on our website. By using our website, you consent to the use of cookies as described in this policy, unless you have disabled them through your browser settings or our cookie consent tool.</p>
    
    <h3>What Are Cookies?</h3>
    <p>Cookies are small text files placed on your device when you visit a website. They help improve your browsing experience by enabling the website to remember your actions and preferences, analyze site performance, and deliver personalized content.</p>
    
    <h3>Types of Cookies We Use</h3>
    <ul>
        <li><strong>Functional Cookies</strong>: Essential for website functionality, enabling features like navigation and saving preferences (e.g., language or cookie consent). Examples include session cookies and consent preferences. Duration: Typically session-based or up to 1 year.</li>
        <li><strong>Analytics Cookies</strong>: Help us understand visitor interactions through anonymous data (e.g., page views, navigation patterns) to improve performance. Duration: Up to 2 years.</li>
        <li><strong>Advertisement Cookies</strong>: Deliver personalized ads and measure campaign effectiveness. Duration: Up to 1 year.</li>
    </ul>
    
    <h3>How We Use Cookies</h3>
    <p>We use cookies to enhance your browsing experience, analyze website traffic, deliver relevant content, and ensure site security and functionality.</p>
    
    <h3>Managing Your Cookie Preferences</h3>
    <p>You can control cookies through:</p>
    <ul>
        <li><strong>Cookie Consent Tool</strong>: Accept all, reject non-essential, or customize cookie types (functional, analytics, advertisement) via the consent dialog. Revisit preferences by clearing your browser cookies or using the consent dialog when it reappears.</li>
        <li><strong>Browser Settings</strong>: Block or delete cookies via your browser settings, though this may affect site functionality. Check your browser's help section for instructions.</li>
    </ul>
    
    <h3>Third-Party Cookies</h3>
    <p>Some cookies are set by third-party services (e.g., analytics or advertising providers). These parties process data according to their own policies.</p>
    
    <h3>Data Privacy</h3>
    <p>Cookies may collect data like IP addresses or browsing behavior. We handle this data responsibly to protect your privacy.</p>
    
    <h3>Changes to This Policy</h3>
    <p>We may update this policy to reflect changes in practices or legal requirements. Check the “Last updated” date for revisions.</p>
    
    <!--<h3>Contact Us</h3>-->
    <!--<p>For questions, contact us at:</p>-->
    <!--<ul>-->
    <!--    <li><strong>Email</strong>: support@example.com</li>-->
    <!--    <li><strong>Address</strong>: Example Company, 123 Main Street, City, Country</li>-->
    <!--</ul>-->
</div>


<script>
    // Helper function to set cookies with secure attributes
    function setCookie(name, value, days) {
        const secure = window.location.protocol === 'https:' ? 'Secure;' : '';
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "expires=" + date.toUTCString() + ";";
        }
        const domain = window.location.hostname;
        document.cookie = `${name}=${encodeURIComponent(value)};${expires}path=/;domain=${domain};${secure}SameSite=Lax`;
    }

    // Helper function to get cookies
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i].trim();
            if (c.indexOf(nameEQ) === 0) {
                return decodeURIComponent(c.substring(nameEQ.length, c.length));
            }
        }
        return null;
    }

    // Enhanced console logging function
    function logCookieData(action, consentValue) {
        if (action === 'accept') {
            console.group('🍪 COOKIES ACCEPTED');
            // console.log('✅ Cookie consent: ACCEPTED');
            // console.log('⏰ Timestamp:', new Date().toLocaleString());
            // console.log('🍪 Consent value stored:', consentValue);
            // console.log('🔧 Enabling tracking and analytics...');
            logAllCookieData();
            console.groupEnd();
        } else if (action === 'reject') {
            console.group('🍪 COOKIES REJECTED');
            // console.log('❌ Cookie consent: REJECTED');
            // console.log('⏰ Timestamp:', new Date().toLocaleString());
            // console.log('🍪 Consent value stored:', consentValue);
            // console.log('🚫 Disabling analytics and marketing tracking');
            console.groupEnd();
        }
    }

    // Function to log all cookie data
    function logAllCookieData() {
        console.group('📊 Cookie Data Overview');
        if (document.cookie) {
            // console.log('🍪 Existing Cookies:');
            const cookies = document.cookie.split(';');
            cookies.forEach(cookie => {
                const [name, value] = cookie.trim().split('=');
                // console.log(`  - ${name}: ${decodeURIComponent(value || '')}`);
            });
        } else {
            // console.log('🍪 No existing cookies found');
        }
        // console.log('🌐 Browser Capabilities:');
        // console.log('  - Cookies Enabled:', navigator.cookieEnabled);
        // console.log('  - Protocol:', window.location.protocol);
        // console.log('  - Domain:', window.location.hostname);
        // console.log('  - User Agent:', navigator.userAgent);
        console.groupEnd();
    }

    // Accept all cookies
    function acceptAll() {
        setCookie("cookie_consent", "all", 365);
        logCookieData('accept', 'all');
        hideCookieConsent();
    }

    // Reject all cookies
    function rejectAll() {
        setCookie("cookie_consent", "none", 365);
        logCookieData('reject', 'none');
        hideCookieConsent();
    }

    // Hide cookie consent banner
    function hideCookieConsent() {
        const cookieConsent = document.getElementById('cookie-consent');
        const cookieBackdrop = document.getElementById('cookie-backdrop');
        if (cookieConsent && cookieBackdrop) {
            cookieConsent.classList.remove('show');
            cookieBackdrop.classList.remove('show');
            setTimeout(() => {
                cookieConsent.style.display = 'none';
                cookieBackdrop.style.display = 'none';
            }, 400);
        }
    }

    // Show cookie consent banner
    function showCookieConsent() {
        const cookieConsent = document.getElementById('cookie-consent');
        const cookieBackdrop = document.getElementById('cookie-backdrop');
        if (cookieConsent && cookieBackdrop) {
            cookieConsent.style.display = 'block';
            cookieBackdrop.style.display = 'block';
            setTimeout(() => {
                cookieBackdrop.classList.add('show');
                cookieConsent.classList.add('show');
            }, 10);
            // console.log('🍪 Cookie consent dialog displayed');
        }
    }

    // Show cookie policy modal
    function showCookiePolicyModal() {
        const modal = document.getElementById('cookie-policy-modal');
        const backdrop = document.getElementById('cookie-backdrop');
        if (modal && backdrop) {
            modal.style.display = 'block';
            backdrop.style.display = 'block';
            setTimeout(() => {
                modal.classList.add('show');
                backdrop.classList.add('show');
            }, 10);
            // console.log('🍪 Cookie policy modal displayed');
        }
    }

    // Hide cookie policy modal
    function hideCookiePolicyModal() {
        const modal = document.getElementById('cookie-policy-modal');
        const backdrop = document.getElementById('cookie-backdrop');
        if (modal && backdrop) {
            modal.classList.remove('show');
            backdrop.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                backdrop.style.display = 'none';
            }, 300);
        }
    }

    // Check cookie consent status
    function checkCookieConsent() {
        const consent = getCookie("cookie_consent");
        if (!consent) {
            showCookieConsent();
        } else {
            // console.log('🍪 Existing cookie consent found:', consent);
        }
    }

    // Reset consent function for testing
    function resetConsent() {
        setCookie("cookie_consent", "", -1);
        showCookieConsent();
        // console.log('🔄 Cookie consent reset - showing dialog again');
    }

    // Set up event listeners
    function setupEventListeners() {
        const acceptBtn = document.getElementById('accept-cookies');
        const rejectBtn = document.getElementById('reject-cookies');
        const policyLink = document.getElementById('cookie-policy-link');
        const closeModalBtn = document.getElementById('close-policy-modal');

        if (acceptBtn) {
            acceptBtn.addEventListener('click', acceptAll);
        }
        if (rejectBtn) {
            rejectBtn.addEventListener('click', rejectAll);
        }
        if (policyLink) {
            policyLink.addEventListener('click', (e) => {
                e.preventDefault();
                showCookiePolicyModal();
            });
        }
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', hideCookiePolicyModal);
        }
    }

    // Initialize cookie consent
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            setupEventListeners();
            checkCookieConsent();
        });
    } else {
        setupEventListeners();
        checkCookieConsent();
    }

    // Make functions globally accessible for testing
    window.resetConsent = resetConsent;
    window.getCookie = getCookie;
</script>