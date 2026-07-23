<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee ID Card</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet" />

    <style>
        /* ── Reset & Base ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            gap: 48px;
            flex-wrap: wrap;
            padding: 40px 20px;
        }

        /* ── Card Container ── */
        .id-card {
            width: 360px;
            height: 560px;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.10), 0 4px 16px rgba(0, 0, 0, 0.04);
            position: relative;
            transition: transform 0.25s ease, box-shadow 0.3s ease;
            flex-shrink: 0;
        }

        .id-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 32px 96px rgba(0, 0, 0, 0.14), 0 4px 20px rgba(0, 0, 0, 0.04);
        }

        /* ── Top Header ── */
        .card-header {
            height: 100px;
            background: linear-gradient(145deg, #1e40af, #3b82f6);
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -48px;
            left: -24px;
            width: 420px;
            height: 110px;
            background: #ffffff;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }

        /* ── Logo ── */
        .logo-wrap {
            position: absolute;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 12;
        }

        .logo-wrap img {
            display: block;
            width: 66px;
            height: 66px;
            border-radius: 50%;
            background: #fff;
            padding: 6px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            object-fit: contain;
        }

        /* ── Profile ── */
        .profile {
            margin-top: -18px;
            text-align: center;
            position: relative;
            z-index: 20;
            padding: 0 20px;
        }

        .profile .avatar {
            width: 118px;
            height: 118px;
            border-radius: 50%;
            border: 5px solid #fff;
            object-fit: cover;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.14);
            display: inline-block;
            background: #e2e8f0;
        }

        .profile .name {
            font-size: 20px;
            font-weight: 700;
            margin-top: 12px;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .profile .designation {
            font-size: 13px;
            font-weight: 500;
            color: #2563eb;
            margin-top: 2px;
        }

        .profile .company {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
            font-weight: 400;
        }

        /* ── Details ── */
        .details {
            padding: 12px 24px 6px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 5px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12px;
        }

        .detail-row:last-of-type {
            border-bottom: none;
        }

        .detail-row .label {
            width: 88px;
            font-weight: 500;
            color: #475569;
            font-size: 11px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .detail-row .value {
            flex: 1;
            color: #0f172a;
            font-weight: 500;
            word-break: break-word;
            font-size: 12px;
        }

        /* ── QR ── */
        .qr-wrap {
            text-align: center;
            margin-top: 4px;
            padding-bottom: 2px;
            min-height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qr-wrap img {
            width: 76px;
            height: 76px;
            border-radius: 8px;
            background: #f8fafc;
            padding: 3px;
            border: 1px solid #e2e8f0;
            display: block;
        }

        .qr-fallback {
            font-size: 11px;
            color: #94a3b8;
            text-align: center;
            padding: 6px;
            background: #f1f5f9;
            border-radius: 8px;
            border: 1px dashed #cbd5e1;
            max-width: 100px;
        }

        /* ── Footer ── */
        .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(145deg, #1e40af, #3b82f6);
            color: #fff;
            text-align: center;
            padding: 10px 16px;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.4px;
            border-top: 1px solid rgba(255, 255, 255, 0.10);
        }

        .card-footer span {
            opacity: 0.85;
        }

        /* ── BACK ── */
        .back .card-header {
            height: 80px;
        }

        .back .card-header::after {
            bottom: -40px;
            height: 90px;
        }

        .back .logo-wrap {
            top: 14px;
        }

        .back .logo-wrap img {
            width: 56px;
            height: 56px;
            padding: 4px;
        }

        .back-content {
            padding: 10px 24px 16px;
            position: relative;
            z-index: 20;
        }

        .back-content h2 {
            text-align: center;
            font-size: 17px;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 10px;
            letter-spacing: -0.2px;
        }

        .back-content .desc {
            font-size: 12px;
            line-height: 1.6;
            color: #475569;
            text-align: justify;
            margin-bottom: 14px;
        }

        /* Emergency */
        .emergency {
            background: #f8fafc;
            border-radius: 14px;
            padding: 12px 16px;
            font-size: 12px;
            line-height: 1.8;
            border-left: 4px solid #3b82f6;
            margin-bottom: 16px;
        }

        .emergency b {
            color: #0f172a;
            font-weight: 600;
        }

        .emergency .em-label {
            color: #64748b;
            font-weight: 400;
            display: inline-block;
            min-width: 50px;
        }

        /* Signature */
        .sign-wrap {
            display: flex;
            justify-content: space-between;
            margin-top: 4px;
            gap: 20px;
        }

        .sign-box {
            flex: 1;
            text-align: center;
        }

        .sign-box .line {
            width: 100%;
            border-top: 1.5px dashed #94a3b8;
            margin-bottom: 4px;
        }

        .sign-box .sign-label {
            font-size: 10px;
            font-weight: 500;
            color: #64748b;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        /* ── Print ── */
        @media print {
            body {
                background: #ffffff;
                padding: 20px;
                gap: 32px;
            }

            .id-card {
                box-shadow: 0 0 0 1px #e2e8f0;
                transform: none !important;
                page-break-inside: avoid;
            }

            .id-card:hover {
                transform: none !important;
                box-shadow: 0 0 0 1px #e2e8f0;
            }
        }

        /* ── Responsive ── */
        @media (max-width: 420px) {
            .id-card {
                width: 100%;
                max-width: 360px;
                height: auto;
                min-height: 540px;
                border-radius: 20px;
            }

            .details {
                padding: 10px 18px 4px;
            }

            .detail-row {
                font-size: 11px;
                padding: 4px 0;
            }

            .detail-row .label {
                width: 74px;
                font-size: 10px;
            }

            .profile .name {
                font-size: 18px;
            }

            .profile .avatar {
                width: 108px;
                height: 108px;
            }

            .back-content {
                padding: 8px 16px 12px;
            }

            .qr-wrap img {
                width: 68px;
                height: 68px;
            }
        }
    </style>
</head>

<body onload="print()">

    <?php
    // ── Fallback / mock data if $employee not defined ──
    if (!isset($employee) || !is_object($employee)) {
        $employee = new stdClass();
        $employee->image = '';
        $employee->name = 'John Smith';
        $employee->employee_id = '1001';
        $employee->blod_group = 'O+';
        $employee->department = 'Engineering';
        $employee->designation = 'Senior Developer';
        $employee->contact_no = '+1 (555) 123-4567';
        $employee->email = 'john.smith@company.com';
        $employee->emergency_name = 'Jane Smith';
        $employee->emergency_phone = '+1 (555) 987-6543';
        $employee->emergency_relation = 'Spouse';
    }

    // ── compute values ──
    $logo = system_info('logo') ?: '';
    $companyName = system_info('company_name') ?: 'Acme Inc.';
    $companyUrl = system_info('company_url') ?: 'www.acme.com';
    $companyPhone = system_info('phone') ?: '+1 (555) 000-0000';
    $companyEmail = system_info('email') ?: 'info@acme.com';

    $image = (!empty($employee->image) && file_exists($employee->image)) ? $employee->image : $logo;
    $empId = 'EMP' . str_pad($employee->employee_id, 4, '0', STR_PAD_LEFT);
    $name = $employee->name ?? 'John Smith';
    $designation = $employee->designation ?? 'Employee';
    $department = $employee->department ?? 'General';
    $blood = $employee->blood_group ?? 'N/A';
    $phone = $employee->contact_no ?? '—';
    $email = $employee->email ?? '—';
    $date_of_joining = $employee->date_of_joining ?? 'N/A';

    $emergencyName = $employee->emergency_name ?? system_info('company_name');
    $emergencyPhone = $employee->emergency_phone ?? $companyPhone;
    $emergencyRelation = $employee->emergency_relation ?? 'Contact';

    // ── QR Code (Google Charts API) ──
    $qrData = $empId . ' | ' . $companyName;
    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=' . $companyUrl;
    ?>

    <!-- ═══ FRONT ═══ -->
    <div class="id-card">

        <div class="card-header">
            <div class="logo-wrap">
                <img src="<?= base_url($logo) ?>" alt="logo" />
            </div>
        </div>

        <div class="profile">
            <img class="avatar" src="<?= base_url($image) ?>" alt="photo" />
            <div class="name"><?= htmlspecialchars($name) ?></div>
            <div class="designation"><?= htmlspecialchars($designation) ?></div>
            <!-- <div class="company"><?= htmlspecialchars($companyName) ?></div> -->
        </div>

        <div class="details">
            <div class="detail-row">
                <span class="label">ID</span>
                <span class="value"><?= htmlspecialchars($empId) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Department</span>
                <span class="value"><?= htmlspecialchars($department) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Blood</span>
                <span class="value"><?= htmlspecialchars($blood) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Phone</span>
                <span class="value"><?= htmlspecialchars($phone) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Email</span>
                <span class="value" style="font-size:11px;"><?= htmlspecialchars($email) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Join Date</span>
                <span class="value" style="font-size:11px;"><?= htmlspecialchars($date_of_joining) ?></span>
            </div>
        </div>

        <div class="qr-wrap">
            <img src="<?= $qrUrl ?>"
                alt="QR Code"
                onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'qr-fallback\'><span>QR</span><br><small>'.$qrData.'</small></div>';" />
        </div>

        <div class="card-footer">
            <span><?= htmlspecialchars($companyUrl) ?></span>
        </div>

    </div>

    <!-- ═══ BACK ═══ -->
    <div class="id-card back">

        <div class="card-header">
            <div class="logo-wrap">
                <img src="<?= base_url($logo) ?>" alt="logo" />
            </div>
        </div>

        <div class="back-content">

            <h2>Employee ID Card</h2>

            <p class="desc">
                This card is the property of <strong><?= htmlspecialchars($companyName) ?></strong>.
                If found, please return it to the company immediately.
                The holder of this card is an authorized employee.
            </p>

            <div class="emergency">
                <b>📞 Emergency Contact</b><br />
                <span class="em-label">Name</span> <?= htmlspecialchars($emergencyName) ?><br />
                <span class="em-label">Phone</span> <?= htmlspecialchars($emergencyPhone) ?><br />
                <span class="em-label">Email</span> <?= htmlspecialchars($companyEmail) ?>
            </div>

            <div class="sign-wrap">
                <div class="sign-box">
                    <div class="line"></div>
                    <span class="sign-label">Employee</span>
                </div>
                <div class="sign-box">
                    <div class="line"></div>
                    <span class="sign-label">Authorized Sign</span>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <span>— <?= htmlspecialchars($companyName) ?> —</span>
        </div>

    </div>

</body>

</html>