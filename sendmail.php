<?php
// Configuration
$destinataire = 'c.mostefaoui@yahoo.fr';
$expediteur = 'noreply@coachtfe.fr';
$sujet = 'Nouveau message depuis le site CoachTFE';

// Sécurité : vérifier que la requête est POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// Fonction pour nettoyer les données
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Détection du type de formulaire
$formType = isset($_POST['form-type']) && $_POST['form-type'] === 'entretien' ? 'entretien' : 'contact';

// Récupération et nettoyage des données communes
$email = filter_var(cleanInput($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone = cleanInput($_POST['phone'] ?? '');

// Validation de l'email
if (!$email) {
    die('Erreur : Adresse email invalide. <a href="javascript:history.back()">Retour</a>');
}

// Fonction pour créer le template HTML
function createEmailTemplate($title, $content) {
    $html = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #f4f5f7;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f4f5f7;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table cellpadding="0" cellspacing="0" border="0" width="600" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #002395 0%, #001b6d 100%); padding: 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600;">CoachTFE.fr</h1>
                            <p style="margin: 10px 0 0 0; color: #ffffff; font-size: 14px; opacity: 0.9;">Expert TFE Infirmier - 15 ans d\'expérience</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            ' . $content . '
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px 30px; text-align: center; border-top: 1px solid #e9ecef;">
                            <p style="margin: 0; color: #6c757d; font-size: 12px;">
                                Ce message a été envoyé depuis le formulaire de contact du site
                                <a href="https://coachtfe.fr" style="color: #002395; text-decoration: none;">coachtfe.fr</a>
                            </p>
                            <p style="margin: 10px 0 0 0; color: #6c757d; font-size: 12px;">
                                © ' . date('Y') . ' CoachTFE.fr - Tous droits réservés
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
    return $html;
}

// Construction du message selon le type de formulaire
if ($formType === 'entretien') {
    // Formulaire d'entretien gratuit
    $nom = cleanInput($_POST['fullName'] ?? '');
    $urgence = cleanInput($_POST['urgency'] ?? '');
    $description = cleanInput($_POST['projectDescription'] ?? '');

    // Validation des champs requis
    if (empty($nom) || empty($phone) || empty($urgence) || empty($description)) {
        die('Erreur : Tous les champs marqués * sont obligatoires. <a href="javascript:history.back()">Retour</a>');
    }

    // Mapping des urgences
    $urgenceLabels = [
        'urgent' => '<span style="color: #dc3545; font-weight: 600;">🔴 Urgent (< 1 mois)</span>',
        'moyen' => '<span style="color: #ffc107; font-weight: 600;">🟡 Moyen terme (1-3 mois)</span>',
        'long' => '<span style="color: #28a745; font-weight: 600;">🟢 Long terme (> 3 mois)</span>'
    ];
    $urgenceFormatted = $urgenceLabels[$urgence] ?? $urgence;

    // Construction du contenu HTML
    $content = '
        <h2 style="margin: 0 0 20px 0; color: #212529; font-size: 20px; font-weight: 600; border-bottom: 2px solid #002395; padding-bottom: 10px;">
            📋 Nouvelle demande d\'entretien gratuit
        </h2>

        <div style="background-color: #e8f5e9; border-left: 4px solid #28a745; padding: 15px; margin: 20px 0; border-radius: 4px;">
            <p style="margin: 0; color: #155724; font-weight: 600;">✅ Nouveau prospect à contacter</p>
            <p style="margin: 5px 0 0 0; color: #155724; font-size: 14px;">Une demande d\'entretien gratuit vient d\'être soumise.</p>
        </div>

        <h3 style="margin: 30px 0 15px 0; color: #495057; font-size: 16px; font-weight: 600;">👤 Informations du contact</h3>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f8f9fa; border-radius: 6px;">
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef;">
                    <strong style="color: #6c757d; font-size: 14px;">Nom complet :</strong>
                    <p style="margin: 5px 0 0 0; color: #212529; font-size: 16px;">' . htmlspecialchars($nom) . '</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef;">
                    <strong style="color: #6c757d; font-size: 14px;">Email :</strong>
                    <p style="margin: 5px 0 0 0; font-size: 16px;">
                        <a href="mailto:' . $email . '" style="color: #002395; text-decoration: none;">' . $email . '</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef;">
                    <strong style="color: #6c757d; font-size: 14px;">Téléphone :</strong>
                    <p style="margin: 5px 0 0 0; font-size: 16px;">
                        <a href="tel:' . $phone . '" style="color: #002395; text-decoration: none;">' . $phone . '</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px 15px;">
                    <strong style="color: #6c757d; font-size: 14px;">Urgence :</strong>
                    <p style="margin: 5px 0 0 0; font-size: 16px;">' . $urgenceFormatted . '</p>
                </td>
            </tr>
        </table>

        <h3 style="margin: 30px 0 15px 0; color: #495057; font-size: 16px; font-weight: 600;">📝 Description du projet</h3>
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 6px; border-left: 3px solid #002395;">
            <p style="margin: 0; color: #212529; font-size: 15px; line-height: 1.6; white-space: pre-wrap;">' . htmlspecialchars($description) . '</p>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px;">
            <p style="margin: 0; color: #856404; font-size: 14px;">
                <strong>⚡ Action requise :</strong> Contacter ce prospect dans les 24h ouvrées pour organiser l\'entretien gratuit.
            </p>
        </div>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e9ecef;">

        <p style="margin: 0; color: #6c757d; font-size: 12px;">
            📅 Date : ' . date('d/m/Y à H:i:s') . '<br>
            🌐 IP : ' . $_SERVER['REMOTE_ADDR'] . '
        </p>';

    $messageBody = createEmailTemplate('Nouvelle demande d\'entretien - CoachTFE', $content);

} else {
    // Formulaire de contact standard
    $nom = cleanInput($_POST['name'] ?? '');
    $message = cleanInput($_POST['message'] ?? '');

    // Validation des champs requis
    if (empty($nom) || empty($phone) || empty($message)) {
        die('Erreur : Tous les champs marqués * sont obligatoires. <a href="javascript:history.back()">Retour</a>');
    }

    // Construction du contenu HTML
    $content = '
        <h2 style="margin: 0 0 20px 0; color: #212529; font-size: 20px; font-weight: 600; border-bottom: 2px solid #002395; padding-bottom: 10px;">
            ✉️ Nouveau message de contact
        </h2>

        <div style="background-color: #d1ecf1; border-left: 4px solid #17a2b8; padding: 15px; margin: 20px 0; border-radius: 4px;">
            <p style="margin: 0; color: #0c5460; font-weight: 600;">📬 Message reçu</p>
            <p style="margin: 5px 0 0 0; color: #0c5460; font-size: 14px;">Un visiteur a envoyé un message depuis le formulaire de contact.</p>
        </div>

        <h3 style="margin: 30px 0 15px 0; color: #495057; font-size: 16px; font-weight: 600;">👤 Informations du contact</h3>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f8f9fa; border-radius: 6px;">
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef;">
                    <strong style="color: #6c757d; font-size: 14px;">Nom complet :</strong>
                    <p style="margin: 5px 0 0 0; color: #212529; font-size: 16px;">' . htmlspecialchars($nom) . '</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef;">
                    <strong style="color: #6c757d; font-size: 14px;">Email :</strong>
                    <p style="margin: 5px 0 0 0; font-size: 16px;">
                        <a href="mailto:' . $email . '" style="color: #002395; text-decoration: none;">' . $email . '</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px 15px;">
                    <strong style="color: #6c757d; font-size: 14px;">Téléphone :</strong>
                    <p style="margin: 5px 0 0 0; font-size: 16px;">
                        <a href="tel:' . $phone . '" style="color: #002395; text-decoration: none;">' . $phone . '</a>
                    </p>
                </td>
            </tr>
        </table>

        <h3 style="margin: 30px 0 15px 0; color: #495057; font-size: 16px; font-weight: 600;">💬 Message</h3>
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 6px; border-left: 3px solid #002395;">
            <p style="margin: 0; color: #212529; font-size: 15px; line-height: 1.6; white-space: pre-wrap;">' . htmlspecialchars($message) . '</p>
        </div>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e9ecef;">

        <p style="margin: 0; color: #6c757d; font-size: 12px;">
            📅 Date : ' . date('d/m/Y à H:i:s') . '<br>
            🌐 IP : ' . $_SERVER['REMOTE_ADDR'] . '
        </p>';

    $messageBody = createEmailTemplate('Nouveau message - CoachTFE', $content);
}

// Headers du mail pour HTML - Optimisés anti-spam
$headers = "From: CoachTFE.fr <" . $expediteur . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Return-Path: " . $expediteur . "\r\n";
$headers .= "Organization: CoachTFE.fr\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 3\r\n"; // Priority normale (1-2 = haute, 3 = normale, 4-5 = basse)
$headers .= "Importance: Normal\r\n";
$headers .= "X-MSMail-Priority: Normal\r\n";
$headers .= "Message-ID: <" . time() . "-" . md5($email . time()) . "@coachtfe.fr>\r\n";
$headers .= "Date: " . date('r') . "\r\n";

// Envoi du mail
$mailSent = mail($destinataire, $sujet, $messageBody, $headers);

// Gestion du résultat
if ($mailSent) {
    // Succès : redirection vers la page de remerciement
    header('Location: merci.html');
    exit;
} else {
    // Échec : message d'erreur
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erreur d'envoi - CoachTFE</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                background-color: #f8f9fa;
            }
            .error-container {
                background: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
            }
            h1 {
                color: #ED2939;
                font-size: 24px;
                margin-bottom: 20px;
            }
            p {
                color: #6c757d;
                margin-bottom: 30px;
                line-height: 1.6;
            }
            .buttons {
                display: flex;
                gap: 15px;
                justify-content: center;
            }
            a {
                display: inline-block;
                padding: 12px 30px;
                background: #002395;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background 0.3s ease;
            }
            a:hover {
                background: #001b6d;
            }
            .back {
                background: #6c757d;
            }
            .back:hover {
                background: #5a6268;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h1>⚠️ Erreur d'envoi</h1>
            <p>Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer ou nous contacter directement par téléphone au <strong>06 80 35 60 22</strong>.</p>
            <div class="buttons">
                <a href="javascript:history.back()" class="back">Retour</a>
                <a href="index.html">Accueil</a>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>