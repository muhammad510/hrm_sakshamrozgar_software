<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="<?php echo system_info('company_name') ?>">
    <meta name="author" content="<?php echo system_info('company_name') ?>">
    <meta name="keywords" content="<?php echo system_info('company_name') ?>">

    <title><?php echo $title ?> | <?php echo system_info('company_name') ?></title>

    <!-- FAVICON -->
    <link rel="icon" href="<?php echo base_url(system_info('favicon')); ?>">

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">

    <style>
        /* ── RESET & BASE ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f0f4fe;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            position: relative;
            margin: 0;
        }

        /* ── HIDE TARGET DIVS ── */
        #target,
        #targetReset {
            display: none !important;
        }

        /* ── BACKGROUND EFFECTS ── */
        .auth-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 10% 20%, rgba(37, 99, 235, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 90% 80%, rgba(99, 102, 241, 0.06) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(37, 99, 235, 0.04) 0%, transparent 70%),
                #f0f4fe;
            pointer-events: none;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
            animation: float 20s ease-in-out infinite alternate;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            top: -150px;
            right: -150px;
            background: rgba(37, 99, 235, 0.06);
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            bottom: -100px;
            left: -100px;
            background: rgba(99, 102, 241, 0.05);
            animation-delay: -7s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(30px, -20px) scale(1.05);
            }

            66% {
                transform: translate(-20px, 30px) scale(0.95);
            }

            100% {
                transform: translate(10px, -10px) scale(1.02);
            }
        }

        /* ── GLASS CARD ── */
        .auth-card {
            position: relative;
            z-index: 1;
            width: 75%;
            max-width: 1120px;
            background: rgba(255, 255, 255, 0.80);
            backdrop-filter: blur(24px) saturate(1.4);
            -webkit-backdrop-filter: blur(24px) saturate(1.4);
            border: 1px solid rgba(255, 255, 255, 0.60);
            border-radius: 12px;
            box-shadow: 0 30px 80px -20px rgba(37, 99, 235, 0.15),
                0 8px 32px -8px rgba(0, 0, 0, 0.04),
                inset 0 1px 0 rgba(255, 255, 255, 0.70);
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.4s ease;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 992px) {
            .auth-card {
                flex-direction: row;
                min-height: auto;
            }
        }

        .auth-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 40px 100px -20px rgba(37, 99, 235, 0.20),
                0 8px 32px -8px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.70);
        }

        /* ── BRAND PANEL ── */
        .brand-panel {
            background: linear-gradient(145deg, #ba47fc, #004e72);
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            position: relative;
            overflow: hidden;
            flex: 0 0 auto;
        }

        @media (min-width: 992px) {
            .brand-panel {
                flex: 0 0 41.666%;
                padding: 48px 40px;
            }
        }

        .brand-panel .pattern {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        .brand-panel .glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
        }

        .brand-panel .glow-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
            background: rgba(255, 255, 255, 0.06);
            animation: pulse 8s ease-in-out infinite alternate;
        }

        .brand-panel .glow-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
            background: rgba(79, 70, 229, 0.20);
            animation: pulse 10s ease-in-out infinite alternate-reverse;
        }

        @keyframes pulse {
            0% {
                opacity: 0.4;
                transform: scale(1);
            }

            100% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* ── SINGLE LOGO (standard size) ── */
        .brand-panel .logo {
            height: 100px;
            width: 100px;
            position: relative;
            z-index: 2;
            display: block;
        }

        .brand-panel .brand-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 24px;
        }

        .brand-panel .avatar-ring {
            position: relative;
            width: 96px;
            height: 96px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-panel .avatar-ring::before,
        .brand-panel .avatar-ring::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.10);
            animation: spin 20s linear infinite;
        }

        .brand-panel .avatar-ring::before {
            inset: -4px;
        }

        .brand-panel .avatar-ring::after {
            inset: -10px;
            border-width: 1px;
            animation-duration: 30s;
            animation-direction: reverse;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .brand-panel .avatar-ring img {
            width: 90px;
            height: 90px;
            /* opacity: 0.9; */
            border-radius: 50px;
        }

        .brand-panel h5 {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .brand-panel .quote {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.80);
            max-width: 280px;
            font-weight: 500;
            line-height: 1.5;
        }

        .brand-panel .status {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.50);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .brand-panel .status .dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 12px rgba(52, 211, 153, 0.40);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 0.6;
                transform: scale(0.9);
            }

            50% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        /* ── FORM PANEL ── */
        .form-panel {
            padding: 32px 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        @media (min-width: 640px) {
            .form-panel {
                padding: 40px 40px;
            }
        }

        @media (min-width: 992px) {
            .form-panel {
                padding: 48px 56px;
            }
        }

        /* ── PANEL FADE TRANSITIONS ── */
        .panel-fade {
            transition: opacity 0.35s ease, transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .panel-fade.hidden-panel {
            opacity: 0;
            transform: translateY(12px) scale(0.97);
            pointer-events: none;
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            padding: inherit;
        }

        .panel-fade.visible-panel {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
            position: relative;
        }

        /* ── HEADINGS ── */
        .form-heading {
            margin-bottom: 6px;
        }


        .form-heading p{
            margin-bottom: 25px;
        }

        .form-heading h3 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        @media (min-width: 640px) {
            .form-heading h3 {
                font-size: 2rem;
            }
        }

        .form-heading p {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 4px;
        }

        /* ── INPUTS ── */
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
            pointer-events: none;
            z-index: 2;
            transition: color 0.25s ease;
        }

        .input-group .form-input {
            width: 100%;
            padding: 14px 20px 14px 48px;
            background: rgba(241, 245, 249, 0.60);
            border: 1.5px solid rgba(226, 232, 240, 0.80);
            border-radius: 16px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.01);
        }

        .input-group .form-input:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.10), inset 0 2px 4px rgba(0, 0, 0, 0.01);
        }

        .input-group .form-input:focus~.input-icon {
            color: #2563eb;
        }

        .input-group .form-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
            font-size: 0.85rem;
        }

        .input-group .input-suffix {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }

        .input-group .input-suffix button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: none;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 1.1rem;
        }

        .input-group .input-suffix button:hover {
            background: rgba(37, 99, 235, 0.06);
            color: #2563eb;
        }

        /* floating label */
        .floating-label {
            position: absolute;
            left: 48px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
            pointer-events: none;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: transparent;
            padding: 0 4px;
            z-index: 1;
            font-family: 'Inter', sans-serif;
        }

        .input-group .form-input:focus~.floating-label,
        .input-group .form-input:not(:placeholder-shown)~.floating-label {
            top: -2px;
            transform: translateY(-50%) scale(0.75);
            color: #2563eb;
            background: rgba(255, 255, 255, 0.90);
            padding: 0 8px;
            border-radius: 6px;
            font-weight: 600;
        }

        .input-group .form-input:not(:focus):not(:placeholder-shown)~.floating-label {
            color: #64748b;
        }

        /* ── BUTTON ── */
        .btn-primary {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 16px 28px;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            color: #fff;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            border: none;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 8px 24px -6px rgba(37, 99, 235, 0.30);
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.10), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
            border-radius: inherit;
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 16px 40px -8px rgba(37, 99, 235, 0.40);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary:active {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 4px 12px -4px rgba(37, 99, 235, 0.30);
        }

        .btn-primary .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.25);
            transform: scale(0);
            animation: rippleAnim 0.6s ease-out forwards;
            pointer-events: none;
        }

        @keyframes rippleAnim {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* ── LINKS ── */
        .link-action {
            font-weight: 600;
            font-size: 0.9rem;
            color: #2563eb;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .link-action:hover {
            color: #1d4ed8;
            transform: translateX(4px);
        }

        .link-action i {
            font-size: 1rem;
            transition: transform 0.2s ease;
        }

        .link-action:hover i {
            transform: translateX(2px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            color: #94a3b8;
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin: 24px 0 12px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(148, 163, 184, 0.20), transparent);
        }

        /* ── LICENSE SPECIFIC ── */
        .license-status {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 20px;
            background: rgba(241, 245, 249, 0.60);
            border: 1px solid rgba(226, 232, 240, 0.60);
            border-radius: 16px;
            margin-bottom: 24px;
        }

        .license-status .icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #fff;
            border: 1px solid rgba(226, 232, 240, 0.60);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .license-status .icon-box img {
            width: 24px;
            height: 24px;
            opacity: 0.6;
        }

        .license-status .status-text {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #94a3b8;
        }

        .license-status .status-value {
            font-size: 0.8rem;
            font-weight: 700;
            color: #0f172a;
        }

        .info-badge {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 20px;
            background: rgba(37, 99, 235, 0.04);
            border: 1px solid rgba(37, 99, 235, 0.10);
            border-radius: 16px;
            font-size: 0.8rem;
            color: #1e3a8a;
            margin-bottom: 24px;
        }

        .info-badge i {
            font-size: 1.2rem;
            color: #2563eb;
            margin-top: 2px;
        }

        .info-badge span {
            font-weight: 500;
            line-height: 1.5;
        }

        /* ── TOAST ── */
        .ami_toast {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%) translateY(-100px);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 24px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px) saturate(1.4);
            -webkit-backdrop-filter: blur(16px) saturate(1.4);
            border: 1px solid rgba(251, 191, 36, 0.25);
            border-radius: 20px;
            box-shadow: 0 20px 60px -12px rgba(0, 0, 0, 0.12), 0 4px 20px -4px rgba(0, 0, 0, 0.04);
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            color: #0f172a;
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            opacity: 0;
            pointer-events: none;
        }

        .ami_toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
            pointer-events: auto;
        }

        .ami_toast .toast-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: rgba(251, 191, 36, 0.10);
            color: #d97706;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .ami_toast .toast-close {
            cursor: pointer;
            color: #94a3b8;
            font-size: 1.2rem;
            padding: 4px;
            background: none;
            border: none;
            transition: color 0.2s ease;
        }

        .ami_toast .toast-close:hover {
            color: #0f172a;
        }

        /* ── LOADER ── */
        #global-loader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(240, 244, 254, 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }

        #global-loader.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .loader-ring {
            position: relative;
            width: 56px;
            height: 56px;
        }

        .loader-ring .ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #2563eb;
            animation: spin 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) infinite;
        }

        .loader-ring .ring:nth-child(2) {
            inset: 8px;
            border-top-color: #4f46e5;
            animation-duration: 1.2s;
            animation-direction: reverse;
        }

        .loader-ring .ring:nth-child(3) {
            inset: 16px;
            border-top-color: #818cf8;
            animation-duration: 0.7s;
        }

        /* ── RESPONSIVE FINE-TUNE ── */
        @media (max-width: 575px) {
            .form-panel {
                padding: 24px 16px;
            }

            .brand-panel {
                padding: 24px 16px;
            }

            .brand-panel .brand-content {
                padding: 16px 0;
            }

            .brand-panel h5 {
                font-size: 1.25rem;
            }

            .brand-panel .quote {
                font-size: 0.8rem;
            }

            .input-group .form-input {
                padding: 12px 16px 12px 40px;
                font-size: 0.85rem;
            }

            .floating-label {
                left: 40px;
                font-size: 0.8rem;
            }

            .btn-primary {
                padding: 14px 20px;
                font-size: 0.9rem;
                border-radius: 14px;
            }

            .form-heading h3 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 380px) {
            .brand-panel .avatar-ring {
                width: 72px;
                height: 72px;
            }

            .brand-panel .avatar-ring img {
                width: 36px;
                height: 36px;
            }
        }

        /* ── UTILITIES ── */
        .text-start {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .clearfix::after {
            content: '';
            display: table;
            clear: both;
        }

        .d-none {
            display: none;
        }

        .d-block {
            display: block;
        }

        .w-100 {
            width: 100%;
        }

        #login_panel,
        #reset_password {
            transition: opacity 0.35s ease, transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
    </style>
</head>

<body>

    <!-- ─── BACKGROUND EFFECTS ─── -->
    <div class="auth-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- ─── TOAST ─── -->
    <div class="ami_toast tst_warning" id="toast-warn">
        <div class="toast-icon"><i class="bx bx-error"></i></div>
        <span id="toast-message">ami popup notification</span>
        <button class="toast-close" id="toast-close" aria-label="Close"><i class="bx bx-x"></i></button>
    </div>

    <!-- ─── LOADER ─── -->
    <div id="global-loader">
        <div class="loader-ring">
            <div class="ring"></div>
            <div class="ring"></div>
            <div class="ring"></div>
        </div>
    </div>

    <!-- ─── MAIN CONTENT ─── -->
    <?php if (config_item('is_valid')): ?>
        <!-- AUTHENTICATION CARD -->
        <div class="auth-card">

            <!-- Form Panel -->
            <div class="form-panel">
                <!-- LOGIN PANEL -->
                <div id="login_panel" class="panel-fade visible-panel">
                    <div class="form-heading">
                        <h3>Sign in</h3>
                        <p class="">Enter your credentials to access your account.</p>
                    </div>
                    <form autocomplete="off" novalidate>
                        <div class="input-group">
                            <input type="email" id="emailID" class="form-input" placeholder=" " aria-label="Email">
                            <i class="bx bx-envelope input-icon"></i>
                            <span class="floating-label">Email Address</span>
                        </div>
                        <div class="input-group">
                            <input type="password" id="usrPass" class="form-input" placeholder=" " aria-label="Password">
                            <i class="bx bx-lock-alt input-icon"></i>
                            <span class="floating-label">Password</span>
                            <div class="input-suffix">
                                <button type="button" class="visiblePass" aria-label="Toggle password">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <!-- hidden target divs – they remain in DOM but are hidden via CSS -->
                        <div id="target"><?php echo $target; ?></div>
                        <button type="button" id="authenticate" class="btn-primary btnActn">
                            <i class="si si-login"></i> Login
                        </button>
                    </form>
                    <div class="divider"></div>
                    <div class="text-start">
                        <a href="javascript:void(0);" class="link-action btnActn" id="forgot_pass">
                            Forgot password? <i class="bx bx-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <!-- RESET PANEL -->
                <div id="reset_password" class="panel-fade hidden-panel">
                    <div class="form-heading">
                        <h3>Reset Password</h3>
                        <p>We'll send a recovery link to your email.</p>
                    </div>
                    <form autocomplete="off" novalidate>
                        <div class="input-group">
                            <input type="email" id="register_email" class="form-input" placeholder=" " aria-label="Recovery email">
                            <i class="bx bx-envelope input-icon"></i>
                            <span class="floating-label">Email Address</span>
                        </div>
                        <div id="targetReset"><?php echo $targetReset; ?></div>
                        <button type="button" id="resetYrPs" class="btn-primary btnActn">
                            <i class="bx bx-send"></i> Send Recovery Link
                        </button>
                    </form>
                    <div class="divider"></div>
                    <div class="text-start">
                        <a href="javascript:void(0);" class="link-action btnActn" id="signIn">
                            <i class="bx bx-chevron-left"></i> Back to Sign In
                        </a>
                    </div>
                </div>
            </div>

            <!-- Brand Panel -->
            <div class="brand-panel">
                <div class="pattern"></div>
                <div class="glow glow-1"></div>
                <div class="glow glow-2"></div>
                <div class="brand-content">
                    <div class="avatar-ring">
                        <img src="<?php echo base_url(system_info('logo')); ?>" class="logo" alt="Logo">
                    </div>
                    <h5 id="actnAmiMark">Welcome Back</h5>
                    <p class="quote">"Discipline is the bridge between goals and accomplishment."</p>
                </div>
                <div class="status d-flex justify-content-center">
                    <span class="dot"></span>
                    Secure · Encrypted
                </div>
            </div>

        </div>

    <?php else: ?>
        <!-- LICENSE GATEWAY CARD -->
        <div class="auth-card">
            <!-- Brand Panel (Lock) -->
            <div class="brand-panel" style="background: linear-gradient(145deg, #1e293b, #0f172a, #1e293b);">
                <div class="pattern"></div>
                <div class="glow glow-1" style="background: rgba(255,255,255,0.03);"></div>
                <div class="glow glow-2" style="background: rgba(0,0,0,0.30);"></div>
                <img src="<?php echo base_url(system_info('logo')); ?>" class="logo" alt="Logo">
                <div class="brand-content">
                    <div style="width:80px;height:80px;border-radius:20px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:center;backdrop-filter:blur(4px);">
                        <img src="<?php echo base_url('assets/img/unlock.png'); ?>" style="width:40px;height:40px;opacity:0.6;filter:brightness(0) invert(1);" alt="Lock">
                    </div>
                    <h5>Deployment Lock</h5>
                    <p class="quote">Enter your license key to activate the system.</p>
                </div>
                <div class="status">
                    <span class="dot" style="background:#fbbf24;box-shadow:0 0 12px rgba(251,191,36,0.40);"></span>
                    Awaiting activation
                </div>
            </div>

            <!-- Form Panel -->
            <div class="form-panel">
                <div class="form-heading">
                    <h3>Enter License Key</h3>
                    <p>Verify your instance to unlock the application.</p>
                </div>

                <div id="target"><?php echo base_url('install/start/isCheckKey'); ?></div>

                <div class="license-status">
                    <div class="icon-box">
                        <img src="<?php echo base_url('assets/img/unlock.png'); ?>" alt="status">
                    </div>
                    <div>
                        <div class="status-text">Security Status</div>
                        <div class="status-value">Awaiting System Enrollment</div>
                    </div>
                </div>

                <form autocomplete="off" novalidate>
                    <div class="input-group">
                        <input type="text" id="liKey" class="form-input" placeholder=" " aria-label="License key" style="font-family:monospace;text-transform:uppercase;text-align:center;letter-spacing:0.1em;">
                        <i class="bx bx-key input-icon"></i>
                        <span class="floating-label">License Key</span>
                    </div>

                    <div class="info-badge">
                        <i class="bx bx-info-circle"></i>
                        <span>Enter the alphanumeric key provided with your purchase to activate the environment.</span>
                    </div>

                    <button type="button" id="unlock_period" class="btn-primary btnActn">
                        <i class="bx bx-unlock-alt"></i> Verify &amp; Unlock
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <!-- ─── SCRIPTS ─── -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/themeColors.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/software.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {

            // ── Panel Toggle ──
            function switchPanel(hideId, showId) {
                var hide = $('#' + hideId);
                var show = $('#' + showId);
                if (!hide.length || !show.length) return;
                hide.removeClass('visible-panel').addClass('hidden-panel');
                show.removeClass('hidden-panel').addClass('visible-panel');
            }

            $('#forgot_pass').click(function(e) {
                e.preventDefault();
                switchPanel('login_panel', 'reset_password');
            });

            $('#signIn').click(function(e) {
                e.preventDefault();
                switchPanel('reset_password', 'login_panel');
            });

            // ── Password Visibility ──
            $('.visiblePass').click(function() {
                var icon = $('i', this);
                icon.toggleClass('fa-eye fa-eye-slash');
                var input = $('#usrPass');
                var type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);
            });

            // ── Ripple Effect ──
            $('.btn-primary').on('click', function(e) {
                var rect = this.getBoundingClientRect();
                var size = Math.max(rect.width, rect.height);
                var x = e.clientX - rect.left - size / 2;
                var y = e.clientY - rect.top - size / 2;
                var ripple = $('<span class="ripple"></span>').css({
                    width: size,
                    height: size,
                    left: x,
                    top: y
                });
                $(this).append(ripple);
                setTimeout(function() {
                    ripple.remove();
                }, 700);
            });

            // ── Toast ──
            var $toast = $('#toast-warn');
            var $toastMsg = $('#toast-message');
            var toastTimer = null;

            window.showToast = function(message, duration) {
                duration = duration || 4000;
                $toastMsg.text(message || 'System notification');
                $toast.addClass('show');
                clearTimeout(toastTimer);
                toastTimer = setTimeout(function() {
                    $toast.removeClass('show');
                }, duration);
            };

            $('#toast-close').click(function() {
                $toast.removeClass('show');
                clearTimeout(toastTimer);
            });

            // ── Loader ──
            setTimeout(function() {
                $('#global-loader').addClass('hidden');
            }, 400);

            window.hideLoader = function() {
                $('#global-loader').addClass('hidden');
            };
            window.showLoader = function() {
                $('#global-loader').removeClass('hidden');
            };

            // ── License key auto-format ──
            $('#liKey').on('input', function() {
                var val = this.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                var parts = [];
                for (var i = 0; i < val.length; i += 5) {
                    parts.push(val.slice(i, i + 5));
                }
                this.value = parts.join('-').slice(0, 29);
            });

        });
    </script>
</body>

</html>