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

    // Construction du corps du message
    $messageBody = "Nouvelle demande d'entretien gratuit reçue depuis le site CoachTFE.fr\n\n";
    $messageBody .= "=== INFORMATIONS DU CONTACT ===\n";
    $messageBody .= "Nom complet : " . $nom . "\n";
    $messageBody .= "Email : " . $email . "\n";
    $messageBody .= "Téléphone : " . $phone . "\n";
    $messageBody .= "Urgence du projet : " . $urgence . "\n\n";
    $messageBody .= "=== DESCRIPTION DU PROJET ===\n";
    $messageBody .= $description . "\n\n";
    $messageBody .= "---\n";
    $messageBody .= "Message envoyé le " . date('d/m/Y à H:i:s') . "\n";
    $messageBody .= "Adresse IP : " . $_SERVER['REMOTE_ADDR'] . "\n";

} else {
    // Formulaire de contact standard
    $nom = cleanInput($_POST['name'] ?? '');
    $message = cleanInput($_POST['message'] ?? '');

    // Validation des champs requis
    if (empty($nom) || empty($phone) || empty($message)) {
        die('Erreur : Tous les champs marqués * sont obligatoires. <a href="javascript:history.back()">Retour</a>');
    }

    // Construction du corps du message
    $messageBody = "Nouveau message reçu depuis le site CoachTFE.fr\n\n";
    $messageBody .= "=== INFORMATIONS DU CONTACT ===\n";
    $messageBody .= "Nom complet : " . $nom . "\n";
    $messageBody .= "Email : " . $email . "\n";
    $messageBody .= "Téléphone : " . $phone . "\n\n";
    $messageBody .= "=== MESSAGE ===\n";
    $messageBody .= $message . "\n\n";
    $messageBody .= "---\n";
    $messageBody .= "Message envoyé le " . date('d/m/Y à H:i:s') . "\n";
    $messageBody .= "Adresse IP : " . $_SERVER['REMOTE_ADDR'] . "\n";
}

// Headers du mail
$headers = "From: " . $expediteur . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "X-Priority: 1\r\n";
$headers .= "X-MSMail-Priority: High\r\n";

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