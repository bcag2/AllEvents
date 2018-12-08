<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
$row_rsFicheAgenda = [];
$row_rsFicheAgenda['AllEvents_Agenda'] = "Spectacles";
$row_rsFicheAgenda['AllEvents_DateDebut'] = "10/09/2017";
$row_rsFicheAgenda['AllEvents_HeureDebut'] = "08:41";
$row_rsFicheAgenda['AllEvents_HeureSceneDisponible'] = "07:00";
$row_rsFicheAgenda['AllEvents_Lieu'] = "Salle des fetes";
$row_rsFicheAgenda['AllEvents_Lieu_Adresse'] = "1 rue des tests";
$row_rsFicheAgenda['AllEvents_Lieu_CodePostal_Ville'] = "59000 Lille";
$row_rsFicheAgenda['AllEvents_Lieu_Pays'] = "France";
$row_rsFicheAgenda['AllEvents_Lieu_Rue'] = "rue des passions";
$row_rsFicheAgenda['AllEvents_Organisation_Cession'] = "1000";
$row_rsFicheAgenda['AllEvents_Organisation_FraisDeplacement'] = "99";
$row_rsFicheAgenda['AllEvents_Organisation_Total'] = "1100";
$row_rsFicheAgenda['AllEvents_Titre'] = "Mon super spectacle";
$row_rsFicheAgenda['RefConcert'] = "2017-101";
$row_rsFicheAgenda['Utilisateur_Administrator_Nom'] = "AdminNom";
$row_rsFicheAgenda['Utilisateur_Organisateur_Adresse1'] = "Orga adr1";
$row_rsFicheAgenda['Utilisateur_Organisateur_CodePostal_Ville'] = "Orga ville";
$row_rsFicheAgenda['Utilisateur_Organisateur_Email'] = "Orga@mail.com";
$row_rsFicheAgenda['Utilisateur_Organisateur_Nom'] = "OrgaNom";
$row_rsFicheAgenda['Utilisateur_Organisateur_Pays'] = "OrgaPays";
$row_rsFicheAgenda['Utilisateur_Organisateur_Telephone'] = "01.01.01.01.01";
$row_rsFicheAgenda['Utilisateur_Organisateur_site_web'] = "www.test.com";
$row_rsFicheAgenda['Utilisateur_Regisseur_Mail'] = "Regi@mail.com";
$row_rsFicheAgenda['Utilisateur_Regisseur_Nom'] = "RegiNom";
$row_rsFicheAgenda['Utilisateur_Regisseur_Telephone'] = "02.02.02.02.02";
$row_rsFicheAgenda['Utilisateur_Technicien_Nom'] = "TechNom";
?>

<div id="contrat_content">
    <p>CONTRAT DE VENTE DE SPECTACLE</p>
    <p>REFERENCE DU DOCUMENT :&nbsp; <?php echo $row_rsFicheAgenda['RefConcert']; ?></p>
    <p>&nbsp;</p>
    <p>Entre les soussign&eacute;s</p>
    <ul style="list-style: none;">
        <li>CASAPALABRE, ASBL</li>
        <li>N° d'entreprise : 0899.111.212</li>
        <li>Boulevard des Fr&egrave;res Rimbaut</li>
        <li>7500 Tournai</li>
        <li>Belgique</li>
        <li>repr&eacute;sent&eacute;e par</li>
        <li>Fr&eacute;d&eacute;ric Mariage, Administrateur</li>
        <li>frederic.mariage@casapalabre.be</li>
        <li>+32(0) 495 54 92 86</li>
    </ul>
    <p>Le producteur, d'une part et</p>
    <ul style="list-style: none;">
        <li><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></strong></li>
        <li><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Adresse1']; ?></strong></li>
        <li><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_CodePostal_Ville']; ?></strong></li>
        <li><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Pays']; ?></strong></li>
        <li>Email : <strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_EMail']; ?></strong></li>
        <li>T&eacute;l&eacute;phone :
            <strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Telephone']; ?></strong></li>
        <li>repr&eacute;sent&eacute;e par
            <strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></strong></li>
        <li>en qualit&eacute; de :</li>
        <li>site internet annon&ccedil;ant l'&eacute;v&eacute;nement
            <strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_site_web']; ?></strong></li>
        <li>facebook</li>
    </ul>
    <p>L'organisateur, d'autre part, il est convenu et arr&ecirc;t&eacute; ce qui suit :</p>
    <p>L'organisateur engage le spectacle&nbsp; <?php echo $row_rsFicheAgenda['AllEvents_Titre']; ?> aux conditions
        suivantes :</p>
    <p>1 - LE SPECTACLE</p>
    <table id="basic-table">
        <tr>
            <td>Nom du spectacle&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Agenda']; ?></strong></td>
        </tr>
        <tr>
            <td>Distribution&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Technicien_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>Direction artistique&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Administrator_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>Nom du r&eacute;gisseur g&eacute;n&eacute;ral&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Regisseur_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>Tel portable&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Regisseur_Telephone']; ?></strong></td>
        </tr>
        <tr>
            <td>Courriel&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Regisseur_Mail']; ?></strong></td>
        </tr>
    </table>
    <p>2 - DONN&Eacute;ES PRATIQUES</p>
    <table>
        <tr>
            <td>Personne charg&eacute;e de l'organisation du concert&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>T&eacute;l&eacute;phone portable&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Telephone']; ?></strong></td>
        </tr>
        <tr>
            <td>Courriel&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Email']; ?></strong></td>
        </tr>
        <tr>
            <td>Nom de la personne charg&eacute;e de la r&eacute;gie d'accueil&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>T&eacute;l&eacute;phone portable&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Telephone']; ?></strong></td>
        </tr>
        <tr>
            <td>Courriel&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Email']; ?></strong></td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <table>
        <tr>
            <td>Lieu du concert&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Lieu']; ?></strong></td>
        </tr>
        <tr>
            <td>Adresse du lieu du concert&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Lieu_Adresse']; ?></strong></td>
        </tr>
        <tr>
            <td>Rue N&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Lieu_Rue']; ?></strong></td>
        </tr>
        <tr>
            <td>CP localit&eacute;&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Lieu_CodePostal_Ville']; ?></strong></td>
        </tr>
        <tr>
            <td>Pays&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_Lieu_Pays']; ?></strong></td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <table>
        <tr>
            <td>Date du concert&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_DateDebut']; ?></strong></td>
        </tr>
        <tr>
            <td>Heure du concert&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_HeureDebut']; ?></strong></td>
        </tr>
        <tr>
            <td>Heure disponibilit&eacute; sc&egrave;ne&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['AllEvents_HeureSceneDisponible']; ?></strong></td>
        </tr>
    </table>
    <p>3 - CONDITIONS FINANCI&Egrave;RES</p>
    <p>Pour sa prestation, le producteur re&ccedil;oit de l'organisateur</p>
    <p>un cachet de : <strong><?php echo $row_rsFicheAgenda['AllEvents_Organisation_Cession']; ?> euros </strong>desquels
        seront d&eacute;duits les &eacute;ventuelles interventions art et vie,</p>
    <p>le remboursement des frais de d&eacute;placement du car/du covoiturage, soit un montant de :
        <strong><?php echo $row_rsFicheAgenda['AllEvents_Organisation_FraisDeplacement']; ?> euros </strong></p>
    <p>Total : <strong><?php echo $row_rsFicheAgenda['AllEvents_Organisation_Total']; ?> euros </strong></p>
    <p>Le montant sera pay&eacute; par compte bancaire ou par ch&egrave;que. Le producteur &eacute;tablira une d&eacute;claration
        de cr&eacute;ance.</p>
    <p>4 - FICHE TECHNIQUE</p>
    <p>Le producteur s'engage &agrave; fournir &agrave; l'organisateur la fiche technique (rider) du spectacle. Cette
        derni&egrave;re, annex&eacute;e au contrat, fait partie int&eacute;grante de celui-ci et doit &ecirc;tre sign&eacute;e
        par les deux parties.</p>
    <p>Cette fiche technique (rider) pr&eacute;cise les lieux, dates et heures du spectacle, la pr&eacute;sentation, le
        cast et les cr&eacute;dits des oeuvres interpr&eacute;t&eacute;es, les indications concernant le parking, les
        loges, le petit catering, les repas, le merchandising, les d&eacute;placements locaux ainsi que les h&eacute;bergements,
        les horaires d'arriv&eacute;e des techniciens et des artistes, les horaires de montage et de spectacle, le
        personnel local n&eacute;cessaire &agrave; sa r&eacute;alisation, les dimensions de la sc&egrave;ne et la sc&eacute;nographie
        du spectacle, le backline &agrave; fournir, le mat&eacute;riel son et &eacute;clairage requis, ainsi que les
        coordonn&eacute;es de tous les intervenants techniques et de production.</p>
    <p>L'organisateur s'engage &agrave; prendre en charge et &agrave; r&eacute;aliser les missions d&eacute;crites dans
        cette fiche technique (rider).</p>
    <p>Cette fiche technique (rider) pourra ensuite &ecirc;tre pr&eacute;cis&eacute;e et/ou adapt&eacute;e en fonction
        des sp&eacute;cificit&eacute;s du lieu de spectacle, de ses capacit&eacute;s techniques et d'accueil ainsi que
        suivant certains imp&eacute;ratifs horaires, ceci en accord avec le r&eacute;gisseur du producteur et le r&eacute;gisseur
        de l'organisateur.</p>
    <p>5 - CONDITIONS GENERALES</p>
    <ol>
        <li>L'organisateur certifie s'&ecirc;tre assur&eacute; de la disponibilit&eacute; du lieu de la repr&eacute;sentation
            et fournira le lieu des repr&eacute;sentations en ordre de marche, suivant les indications de la fiche
            technique fournie par le producteur. L'organisateur s'engage &agrave; ce que le nombre de spectateurs admis
            dans le lieu soit strictement inf&eacute;rieur aux quotas d&eacute;finis dans les prescriptions de s&eacute;curit&eacute;.
        </li>
        <li>L'ensemble du catering (buffet froid, repas chauds, petit catering, eau de sc&egrave;ne, etc...), des d&eacute;placement
            locaux, des h&eacute;bergements ainsi que l'ensemble des locations pour le spectacle (piano, backline,
            podiums et &eacute;l&eacute;ments divers de sc&egrave;ne, mat&eacute;riel son et lumi&egrave;re, etc...)
            sont &agrave; charge de l'organisateur.
        </li>
        <li>L'organisateur sera responsable de l'obtention des autorisations administratives. Il s'assurera en outre le
            service g&eacute;n&eacute;ral du lieu, location, accueil, billetterie, comptabilit&eacute; des recettes,
            service de s&eacute;curit&eacute;. En qualit&eacute; d'employeur, il assurera les r&eacute;mun&eacute;rations,
            charges fiscales et sociales de ce personnel.
        </li>
        <li>L'organisateur aura &agrave; sa charge les d&eacute;clarations aupr&egrave;s des soci&eacute;t&eacute;s
            d'auteurs, ainsi que le r&egrave;glement des droits correspondants.
        </li>
        <li>Le producteur est tenu d'assurer contre tous les risques de vols et de d&eacute;gradation pouvant
            survenir &agrave; l'occasion de transports et entreposages ex&eacute;cut&eacute;s entre deux concerts, tout
            objet ou mat&eacute;riel qu'il fournit pour le spectacle. L'organisateur mettra &agrave; disposition des
            loges fermant &agrave; clef et sera responsable de la protection et du gardiennage des &eacute;quipements (d&eacute;cor,
            r&eacute;gie, costume, effets personnels...) mis &agrave; disposition au producteur et l'&eacute;quipe
            accompagnatrice. Enfin, l'organisateur certifie avoir souscrit les assurances en responsabilit&eacute;
            civile couvrant les risques li&eacute;s aux repr&eacute;sentations du spectacle lui-m&ecirc;me.
        </li>
        <li>En mati&egrave;re de publicit&eacute; et d'information, l'organisateur s'efforcera de respecter l'esprit g&eacute;n&eacute;ral
            de la documentation fournie par le producteur et observera scrupuleusement les mentions obligatoires. Le
            prix des places sera fix&eacute; au libre choix de l'organisateur.
        </li>
        <li>En dehors des &eacute;missions radiophoniques ou t&eacute;l&eacute;vis&eacute;es d'une dur&eacute;e de trois
            minutes au plus, tout enregistrement ou diffusion, m&ecirc;me partiel, des repr&eacute;sentations, objet du
            pr&eacute;sent contrat, n&eacute;cessite un accord particulier. L'organisateur prendra en outre les
            dispositions n&eacute;cessaires afin qu'aucune prise de vue (photo, vid&eacute;o,...) ou de son ne puise se
            faire sans l'accord expr&egrave;s du producteur.
        </li>
        <li>Le pr&eacute;sent contrat se trouverait suspendu ou annul&eacute; de plein droit et sans indemnit&eacute;
            d'aucune sorte, dans tous les cas reconnus de force majeure. On entend par cas de force majeure, des
            circonstances qui se sont produites apr&egrave;s la signature du contrat, en raison de fait d'un caract&egrave;re
            impr&eacute;visible et insurmontable et qui ne peuvent pas &ecirc;tre caus&eacute;es par les contractants et
            notamment : catastrophes naturelles, guerre, insurrection, incendie, gr&egrave;ve des services publics, gr&egrave;ve
            du personnel, maladie d'un des artistes, certificat m&eacute;dical &agrave; l'appui et autres circonstances
            insurmontables dont l'organisateur ou le producteur est responsable.
        </li>
    </ol>
    <p>En cas de force majeure, le co-contractant emp&ecirc;ch&eacute; pr&eacute;viendra imm&eacute;diatement l'autre
        partie afin de suspendre le contrat, cette derni&egrave;re se r&eacute;servant le droit d'y mettre un terme sans
        indemnit&eacute; d'aucune sorte.</p>
    <p>En cas de d&eacute;sir de reconduction du contrat, apr&egrave;s cessation des circonstances qui emp&ecirc;chent
        son ex&eacute;cution, les deux parties se r&eacute;servent une nouvelle n&eacute;gociation.</p>
    <p>Au cas o&ugrave; des difficult&eacute;s surviendraient entre les parties &agrave; propos de l'ex&eacute;cution ou
        de l'interpr&eacute;tation du pr&eacute;sent contrat, celles-ci s'engagent &agrave; d'abord coop&eacute;rer
        pleinement avec diligence et bonne foi en vue de trouver une solution amiable au litige.</p>
    <p>Comp&eacute;tence juridique : en cas de recours judiciaire, les parties conviennent de s'en remettre &agrave;
        l'appr&eacute;ciation des tribunaux de Tournai.</p>
    <p>Le pr&eacute;sent contrat entrera en vigueur &agrave; dater de sa signature par les deux parties, sous les
        conditions expresses d&eacute;crites en pr&eacute;ambule et dans la fiche technique annex&eacute;e au
        contrat</p>
    <p>Si vous ne pouviez r&eacute;aliser tous les points fix&eacute;s dans la fiche technique, prenez contact avec
        :</p>
    <table>
        <tr>
            <td>l'administrateur&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Administrator_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>le r&eacute;gisseur g&eacute;n&eacute;ral&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Technicien_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>l'ing&eacute;nieur son&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Technicien_Nom']; ?></strong></td>
        </tr>
        <tr>
            <td>l'&eacute;clairagiste&nbsp;:&nbsp;</td>
            <td><strong><?php echo $row_rsFicheAgenda['Utilisateur_Technicien_Nom']; ?></strong></td>
        </tr>
    </table>
    <p>Fait &agrave; Tournai le</p>
    <ul style="list-style: none;">
        <li>Nombre de pages :</li>
        <li>Nombre d'annexe :</li>
    </ul>
    <p>en ce compris la fiche technique</p>
    <p>&nbsp;</p>
    <p>Le producteur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        L'organisateur</p>
    <p>Pour la Casa Palabre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Pour <?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></p>
    <p>Fr&eacute;d&eacute;ric Mariage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong><?php echo $row_rsFicheAgenda['Utilisateur_Organisateur_Nom']; ?></strong></p>
    <p>Administrateur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
</div>