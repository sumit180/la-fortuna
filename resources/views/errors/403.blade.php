@extends('layouts.app')

@section('title', '403 - Access Forbidden')

@section('content')
<style>
    .error-section { 
        min-height: 60vh; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        padding: 60px 0; 
        background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 100%);
    }
    .error-content { 
        text-align: center; 
        max-width: 600px; 
        padding: 40px 20px; 
    }
    .error-code { 
        font-size: 120px; 
        font-weight: 700; 
        background: linear-gradient(135deg, var(--gold), var(--gold-dark)); 
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent; 
        background-clip: text; 
        line-height: 1; 
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
    }
    .error-title { 
        font-size: 32px; 
        font-weight: 700; 
        color: var(--dark); 
        margin-bottom: 16px; 
        font-family: 'Playfair Display', serif;
    }
    .error-message { 
        font-size: 16px; 
        color: var(--gray); 
        line-height: 1.6; 
        margin-bottom: 32px; 
    }
    .error-actions { 
        display: flex; 
        gap: 16px; 
        justify-content: center; 
        flex-wrap: wrap; 
    }
    .error-icon { 
        font-size: 60px; 
        color: var(--gold); 
        margin-bottom: 24px; 
        opacity: 0.8; 
    }
</style>

<section class="error-section">
    <div class="error-content">
        <div class="error-icon">
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="error-code">403</div>
        <h1 class="error-title">Access Forbidden</h1>
        <p class="error-message">
            This area is like our VIP section - you need special access to enter. 
            If you believe you should have access, please contact us.
        </p>
        <div class="error-actions">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fa-solid fa-home"></i> Back to Home
            </a>
            <a href="{{ route('contact') }}" class="btn btn-secondary">
                <i class="fa-solid fa-phone"></i> Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
