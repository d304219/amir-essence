@extends('layouts.base')

@section('content')
<div class="wrapper">
    <div class="hero">
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p>
                We're here to help you with any questions or inquiries you may have about Amir Essence. 
                Feel free to get in touch with us via the contact form, email, or phone.
            </p>
        </div>
        <div class="hero-image">
            <img style="filter: drop-shadow(2px 2px 10px #2222229a);" src="/img/LogoDark.png" alt="Contact Amir Essence">
        </div>
    </div>

    <div class="contact-section">
        <div class="map-section">
            <h2>Our Location</h2>
            <p>Visit us at our headquarters or find us on the map below:</p>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4955.813031504953!2d4.775722176476194!3d51.606601471835916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c69f987a717e09%3A0x4f8cfa163463253!2sTerheijdenseweg%20350%2C%204826%20AA%20Breda!5e0!3m2!1sen!2snl!4v1733077527088!5m2!1sen!2snl"
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <div class="contact-form">
            <h2>Contact Form</h2>
            <form action="" method="">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write your message here" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </div>

    <div class="contact-info">
        <h2>Get in Touch</h2>
        <p>We’d love to hear from you! Reach us through any of the following channels:</p>
        <ul>
            <li><strong>Email:</strong> info@amiressence.com</li>
            <li><strong>Phone:</strong> +1 800-555-1234</li>
            <li><strong>Address:</strong> Terheijdenseweg 350, 4826 AA Breda</li>
        </ul>

        
    </div>


</div>

<style>.contact-section {
    display: flex;
    justify-content: space-between;
    gap: 40px;
    margin-top: 40px;
}

.contact-info {
    margin: 60px 0 0 0;
    flex: 1;
    color: #333;
    font-size: 16px;
}

.contact-info h2 {
    font-size: 24px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.contact-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.contact-info ul li {
    margin-bottom: 10px;
}

.contact-form {
    flex: 1;
}

.contact-form h2 {
    font-size: 24px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.contact-form .form-group {
    margin-bottom: 20px;
}

.contact-form label {
    display: block;
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

.contact-form input, 
.contact-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.contact-form .btn {
    display: block;
    margin-top: 20px;
}

.map-section {
    text-align: center;
}

.map-section h2 {
    font-size: 24px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.map-container {
    width: 100%;
    height: 400px;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
}
</style>
@endsection
