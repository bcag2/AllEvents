<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;
JHtml::_('behavior.modal');
$document = JFactory::getDocument();
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js');
$user = JFactory::getUser();
$db = JFactory::getDbo();

$organizer_contact_item = null;
$representative_contact_item = null;
$photographer_contact_item = null;
$producer_contact_item = null;
$steward_contact_item = null;
$soundman_contact_item = null;
$speaker_contact_item = null;
$gathering_place_item = null;

if (!empty($this->item->organizer_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->organizer_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $organizer_contact_item = $results;
    }
}
if (!empty($this->item->representative_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->representative_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $representative_contact_item = $results;
    }
}
if (!empty($this->item->producer_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->producer_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $producer_contact_item = $results;
    }
}
if (!empty($this->item->soundman_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->soundman_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $soundman_contact_item = $results;
    }
}
if (!empty($this->item->steward_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("a.*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->steward_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $steward_contact_item = $results;
    }
}
if (!empty($this->item->speaker_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("a.*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->speaker_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $speaker_contact_item = $results;
    }
}
if (!empty($this->item->photographer_contact_id)) {
    $query = $db->getQuery(true);
    $query->select("a.*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->photographer_contact_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $photographer_contact_item = $results;
    }
}
if (!empty($this->item->gathering_place_id)) {
    $query = $db->getQuery(true);
    $query->select("a.*");
    $query->from('`#__contact_details` a');
    $query->where('id = ' . $this->item->gathering_place_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $gathering_place_item = $results;
    }
}

$agenda = null;
if (!empty($this->item->agenda_id)) {
    $query = $db->getQuery(true);
    $query->select("a.*");
    $query->from('`#__allevents_agenda` a');
    $query->where('id = ' . $this->item->agenda_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $agenda = $results;
    }
}

$place = null;
if (!empty($this->item->place_id)) {
    $query = $db->getQuery(true);
    $query->select("titre,numero,rue,codepostal,ville,country");
    $query->from('`#__allevents_places` a');
    $query->where('id = ' . $this->item->place_id);
    $db->setQuery($query);
    $results = $db->loadObject();
    if ($results) {
        $place = $results;
    }
}

?>

<div id="container_planification">
    <h4><?php echo JText::_('COM_ALLEVENTS_PLANIFICATION_DESC'); ?></h4>
    <hr>
    <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', ['active' => 'planification_general']); ?>

    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'planification_general', JText::_('COM_ALLEVENTS_PLANIFICATION_ORGA', true)); ?>
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <fieldset class="adminform">
                <div class="span6 aeleft">
                    <?php echo $this->form->renderField('conveyance'); ?>
                    <?php echo $this->form->renderField('location'); ?>
                    <?php echo $this->form->renderField('gathering_place_id'); ?>
                    <?php echo $this->form->renderField('money'); ?>
                    <?php echo $this->form->renderField('artetvie'); ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('service_price'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->service_price; ?>"
                                   id="jform_service_price" name="jform[service_price]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('travel_expenses'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->travel_expenses; ?>"
                                   id="jform_travel_expenses" name="jform[travel_expenses]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('launch_expenses'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->launch_expenses; ?>"
                                   id="jform_launch_expenses" name="jform[launch_expenses]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('accommodation_expenses'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->accommodation_expenses; ?>"
                                   id="jform_accommodation_expenses" name="jform[accommodation_expenses]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('service_cachet'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->service_cachet; ?>"
                                   id="jform_service_cachet" name="jform[service_cachet]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('service_profit'); ?></div>
                        <div class="controls input-append">
                            <input type="text" class="validate-numeric input-small money"
                                   value="<?php echo $this->item->service_profit; ?>"
                                   id="jform_service_profit" name="jform[service_profit]">
                            <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="span6 aeleft">

                    <?php echo $this->form->renderField('contacts'); ?>
                    <?php if ($user->authorise('core.planifadmin')) { ?>
                        <div class="control-group">
                            <div class="control-label">Add Contact</div>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="#"
                                                          id="contact-activator"><i class="icon-new"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="contact-form"
                         style="background: #ddd none repeat scroll 0 0;display: block;padding: 10px;">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="contact-save-button">
                                    <i class="icon-ok"></i><?php echo JText::_('JSAVE'); ?>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn" id="contact-cancel-button">
                                    <i class="icon-cancel"></i><?php echo JText::_('JCANCEL'); ?>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" id="contact_token" value="<?php echo JSession::getFormToken(); ?>"/>
                        <div class="control-group">
                            <div class="control-label"><label class="" for="contact_titre"
                                                              id="contact_titre-lbl"><?php echo JText::_('JGLOBAL_TITLE'); ?></label>
                            </div>
                            <div class="controls"><input type="text" class="input-large-text" value=""
                                                         id="contact_titre" name="contact[titre]"></div>
                        </div>
                    </div>
                    <div id="contact-select">
                        <?php echo $this->form->renderField('organizer_contact_id'); ?>
                        <?php echo $this->form->renderField('representative_contact_id'); ?>
                        <?php echo $this->form->renderField('photographer_contact_id'); ?>
                        <?php echo $this->form->renderField('producer_contact_id'); ?>
                        <?php echo $this->form->renderField('steward_contact_id'); ?>
                        <?php echo $this->form->renderField('soundman_contact_id'); ?>
                        <?php echo $this->form->renderField('speaker_contact_id'); ?>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo JHtml::_('bootstrap.endTab'); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'planification_schedule', JText::_('COM_ALLEVENTS_PLANIFICATION_SCHEDULE', true)); ?>
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <fieldset class="adminform">
                <div class="span6 aeleft">
                    <?php echo $this->form->renderField('technicians'); ?>
                    <?php echo $this->form->renderField('technicians_going_time'); ?>
                    <?php echo $this->form->renderField('technicians_arrival_time'); ?>
                    <?php echo $this->form->renderField('technicians_return_time'); ?>
                    <?php echo $this->form->renderField('stage_available_time'); ?>
                </div>
                <div class="span6 aeleft">
                    <?php echo $this->form->renderField('musicians'); ?>
                    <?php echo $this->form->renderField('musicians_going_time'); ?>
                    <?php echo $this->form->renderField('musicians_arrival_time'); ?>
                    <?php echo $this->form->renderField('musicians_return_time'); ?>
                    <?php echo $this->form->renderField('install_time'); ?>
                    <?php echo $this->form->renderField('sound_balance_time'); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo JHtml::_('bootstrap.endTab'); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'planification_description', JText::_('COM_ALLEVENTS_PLANIFICATION_DESCRIPTION', true)); ?>
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <?php echo $this->form->renderField('planification_description'); ?>
        </div>
    </div>
    <?php echo JHtml::_('bootstrap.endTab'); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'planification_contract', JText::_('COM_ALLEVENTS_PLANIFICATION_CONTRACT', true)); ?>
    <div class="row-fluid">
        <!--<a id="refresh_contrat" href="#" class="btn btn-primary btn-lg">
            <span class="fa fa-refresh"></span> Refresh Contract
        </a>-->

        <a id="download_pdf" href="#" class="btn btn-primary btn-lg">
            <span class="fa fa-print"></span> Edit Contract
        </a>
        <div id="contrat_content">
        </div>
    </div>
    <?php echo JHtml::_('bootstrap.endTab'); ?>
    <?php echo JHtml::_('bootstrap.endTabSet'); ?>
</div>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('#refresh_contrat').click(function () {
                $.ajax({
                    type: "GET",//post
                    url: 'index.php?option=com_allevents&task=display&view=event&format=ajax&layout=event_contract&tmpl=component',
                    data: "id=" +<?php echo (int)$this->item->id; ?>,
                    success: function (data) {
                        // data is ur summary
                        $('#contrat_content').html(data);
                    }
                });
            });

            $('#download_pdf').click(function () {
                var doc = new jsPDF('p', 'pt', 'letter');
                var i = 0;

                doc.setFontType('bold');
                doc.setFontSize(22);
                i = 40;
                doc.text(20, i, "CONTRAT DE VENTE DE SPECTACLE");
                i += 30;
                doc.text(20, i, "<?php echo date("Y") . $this->item->titre;?>");

                doc.setFontType('normal');
                doc.setFontSize(12);
                i += 30;
                doc.text(20, i, "Entre les soussignés");

                i += 16;
                doc.text(50, i, "CASAPALABRE, ASBL");
                i += 16;
                doc.text(50, i, "N° d'entreprise : 0899.111.212");
                i += 16;
                doc.text(50, i, "Boulevard des Frères Rimbaut");
                i += 16;
                doc.text(50, i, "7500 Tournai");
                i += 16;
                doc.text(50, i, "Belgique");
                i += 32;
                doc.text(40, i, "représentée par");
                i += 16;
                doc.text(50, i, "Frédéric Mariage, Administrateur");
                i += 16;
                doc.text(50, i, "frederic.mariage@casapalabre.be");
                i += 16;
                doc.text(50, i, "+32(0) 495 54 92 86");

                i += 30;
                doc.text(20, i, "Le producteur, d'une part et");

                i += 16;
                doc.text(50, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->name : '';?>");
                i += 16;
                doc.text(50, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->address : '';?>");
                i += 16;
                doc.text(50, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->postcode . ' ' . $organizer_contact_item->suburb : '';?>");
                i += 16;
                doc.text(50, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->country : '';?>");
                i += 16;
                doc.text(50, i, "Email : <?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->email_to : '';?>");
                i += 16;
                doc.text(50, i, "Téléphone : <?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->telephone : '';?>");
                i += 32;
                doc.text(40, i, "représentée par <?php echo (isset($representative_contact_item)) ? $representative_contact_item->name : '';?>");
                i += 16;
                doc.text(50, i, "en qualité de :");
                i += 16;
                doc.text(50, i, "site internet annonçant l'événement <?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->webpage : '';?>");
                // i += 16;
                // doc.text(40, i, "facebook");

                i += 30;
                doc.text(20, i, "L'organisateur, d'autre part, il est convenu et arrêté ce qui suit :");

                i += 30;
                doc.text(20, i, "L'organisateur engage le spectacle `<?php echo $this->item->titre;?>` aux conditions suivantes :");

                doc.setFontType('bold');
                doc.setFontSize(14);
                i += 30;
                doc.text(20, i, "1 - LE SPECTACLE");

                doc.setFontType('normal');
                doc.setFontSize(12);

                i += 16;
                doc.text(40, i, "Nom du spectacle :");
                i += 0;
                doc.text(200, i, "<?php echo $agenda->titre;?>");

                i += 16;
                doc.text(40, i, "Notre Régisseur général");
                i += 0;
                doc.text(200, i, "<?php echo (isset($steward_contact_item)) ? $steward_contact_item->name : '';?>");

                i += 16;
                doc.text(50, i, "Tel portable");
                i += 0;
                doc.text(200, i, "<?php echo (isset($steward_contact_item)) ? $steward_contact_item->telephone : '';?>");

                i += 16;
                doc.text(50, i, "Courriel");
                i += 0;
                doc.text(200, i, "<?php echo (isset($steward_contact_item)) ? $steward_contact_item->email_to : '';?>");

                doc.addPage();

                doc.setFontType('bold');
                doc.setFontSize(14);
                i = 40;
                doc.text(20, i, "2 - DONNÉES PRATIQUES");

                doc.setFontType('normal');
                doc.setFontSize(12);

                i += 16;
                doc.text(40, i, "Personne chargée de l'organisation du concert");
                i += 0;
                doc.text(310, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->name : '';?>");

                i += 16;
                doc.text(50, i, "Téléphone portable");
                i += 0;
                doc.text(310, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->telephone : '';?>");

                i += 16;
                doc.text(50, i, "Courriel");
                i += 0;
                doc.text(310, i, "<?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->email_to : '';?>");

                i += 16;
                doc.text(40, i, "Nom de la personne chargée de la régie d'accueil");
                i += 0;
                doc.text(310, i, "<?php echo (isset($producer_contact_item)) ? $producer_contact_item->name : '';?>");

                i += 16;
                doc.text(50, i, "Téléphone portable");
                i += 0;
                doc.text(310, i, "<?php echo (isset($producer_contact_item)) ? $producer_contact_item->telephone : '';?>");

                i += 16;
                doc.text(50, i, "Courriel");
                i += 0;
                doc.text(310, i, "<?php (isset($producer_contact_item)) ? $producer_contact_item->email_to : '';?>");

                i += 16;
                doc.text(40, i, "Lieu du concert");
                i += 0;
                doc.text(310, i, "<?php echo $place->titre;?>");

                i += 16;
                doc.text(40, i, "Adresse du lieu du concert");
                i += 0;
                doc.text(310, i, "<?php echo $place->rue;?>");

                i += 16;
                doc.text(40, i, "Rue N");
                i += 0;
                doc.text(310, i, "<?php echo $place->numero;?>");

                i += 16;
                doc.text(40, i, "CP localité");
                i += 0;
                doc.text(310, i, "<?php echo $place->codepostal . ' ' . $place->ville;?>");

                i += 16;
                doc.text(40, i, "Pays");
                i += 0;
                doc.text(310, i, "<?php echo $place->country;?>");

                i += 16;
                doc.text(40, i, "Date du concert");
                i += 0;
                doc.text(310, i, "<?php echo JHtml::_('date', $this->item->date, 'Y-m-d');?>");

                i += 16;
                doc.text(40, i, "Heure du concert");
                i += 0;
                doc.text(310, i, "<?php echo JHtml::_('date', $this->item->date, 'h:i');?>");

                i += 16;
                doc.text(40, i, "Heure disponibilité scène");
                i += 0;
                doc.text(310, i, "<?php echo substr($this->item->stage_available_time, 0, 5);?>");

                doc.setFontType('bold');
                doc.setFontSize(14);
                i += 30;
                doc.text(20, i, "3 - CONDITIONS FINANCIÈRES");

                doc.setFontType('normal');
                doc.setFontSize(12);
                i += 16;
                doc.text(40, i, "Pour sa prestation, le producteur reçoit de l'organisateur");
                i += 16;
                doc.text(40, i, "un cachet de : <?php echo $this->item->service_price;?> € desquels seront déduits les éventuelles interventions art et vie,");
                i += 16;
                doc.text(40, i, "le remboursement des frais (déplacement du car/du covoiturage, repas, hébergement), soit un montant de : <?php echo (int)($this->item->travel_expenses + $this->item->launch_expenses + $this->item->accommodation_expenses);?> € ");
                i += 16;
                doc.text(40, i, "Total : <?php echo $this->item->service_cachet;?> € ");
                i += 16;
                doc.text(40, i, "Le montant sera payé par compte bancaire ou par chèque. Le producteur établira une déclaration");
                i += 16;
                doc.text(40, i, "de créance.");

                doc.setFontType('bold');
                doc.setFontSize(14);
                i += 30;
                doc.text(20, i, "4 - FICHE TECHNIQUE");

                doc.setFontType('normal');
                doc.setFontSize(12);
                i += 16;
                doc.text(40, i, "Le producteur s'engage à fournir à l'organisateur la fiche technique (rider) du spectacle. ");
                i += 16;
                doc.text(40, i, "Cette dernière, annexée au contrat, fait partie intégrante de celui-ci et doit être signée par les ");
                i += 16;
                doc.text(40, i, "deux parties.");
                i += 16;
                doc.text(40, i, "Cette fiche technique (rider) précise les lieux, dates et heures du spectacle, la présentation, ");
                i += 16;
                doc.text(40, i, "le cast et les crédits des oeuvres interprétées, les indications concernant le parking, les loges, ");
                i += 16;
                doc.text(40, i, "le petit catering, les repas, le merchandising, les déplacements locaux ainsi que les hébergements, ");
                i += 16;
                doc.text(40, i, "les horaires d'arrivée des techniciens et des artistes, les horaires de montage et de spectacle, le");
                i += 16;
                doc.text(40, i, "personnel local nécessaire à sa réalisation, les dimensions de la scène et la scénographie du");
                i += 16;
                doc.text(40, i, "spectacle, le backline à fournir, le matériel son et éclairage requis, ainsi que les coordonnées");
                i += 16;
                doc.text(40, i, "de tous les intervenants techniques et de production.");
                i += 16;
                doc.text(40, i, "L'organisateur s'engage à prendre en charge et à réaliser les missions décrites dans cette fiche");
                i += 16;
                doc.text(40, i, "technique (rider).");
                i += 16;
                doc.text(40, i, "Cette fiche technique (rider) pourra ensuite être précisée et/ou adaptée en fonction des ");
                i += 16;
                doc.text(40, i, "spécificités du lieu de spectacle, de ses capacités techniques et d'accueil ainsi que suivant ");
                i += 16;
                doc.text(40, i, "certains impératifs horaires, ceci en accord avec le régisseur du producteur et le régisseur ");
                i += 16;
                doc.text(40, i, "de l'organisateur.");

                doc.addPage();

                doc.setFontType('bold');
                doc.setFontSize(14);
                i = 40;
                doc.text(20, i, "5 - CONDITIONS GÉNÉRALES");
                doc.setFontType('normal');
                doc.setFontSize(12);
                i += 16;
                doc.text(20, i, "a.  L'organisateur certifie s'être assuré de la disponibilité du lieu de la représentation et ");
                i += 16;
                doc.text(20, i, "fournira le lieu des représentations en ordre de marche, suivant les indications de la fiche ");
                i += 16;
                doc.text(20, i, "technique fournie par le producteur. L'organisateur s'engage à ce que le nombre de spectateurs");
                i += 16;
                doc.text(20, i, "admis dans le lieu soit strictement inférieur aux quotas définis dans les prescriptions de sécurité.");
                i += 16;
                i += 16;
                doc.text(20, i, "b.  L'ensemble du catering (buffet froid, repas chauds, petit catering, eau de scène, etc...), des");
                i += 16;
                doc.text(20, i, "déplacement locaux, des hébergements ainsi que l'ensemble des locations pour le spectacle (piano,");
                i += 16;
                doc.text(20, i, "backline, podiums et éléments divers de scène, matériel son et lumière, etc...) sont à charge de ");
                i += 16;
                doc.text(20, i, "l'organisateur.");
                i += 16;
                i += 16;
                doc.text(20, i, "c.  L'organisateur sera responsable de l'obtention des autorisations administratives. Il s'assurera en ");
                i += 16;
                doc.text(20, i, "outre le service général du lieu, location, accueil, billetterie, comptabilité des recettes, service ");
                i += 16;
                doc.text(20, i, "de sécurité. En qualité d'employeur, il assurera les rémunérations, charges fiscales et sociales de ");
                i += 16;
                doc.text(20, i, "ce personnel.");
                i += 16;
                i += 16;
                doc.text(20, i, "d.  L'organisateur aura à sa charge les déclarations auprès des sociétés d'auteurs, ainsi que le règlement");
                i += 16;
                doc.text(20, i, "des droits correspondants.");
                i += 16;
                i += 16;
                doc.text(20, i, "e.  Le producteur est tenu d'assurer contre tous les risques de vols et de dégradation pouvant survenir ");
                i += 16;
                doc.text(20, i, "à l'occasion de transports et entreposages exécutés entre deux concerts, tout objet ou matériel qu'il ");
                i += 16;
                doc.text(20, i, "fournit pour le spectacle. L'organisateur mettra à disposition des loges fermant à clef et sera ");
                i += 16;
                doc.text(20, i, "responsable de la protection et du gardiennage des équipements (décor, régie, costume, effets ");
                i += 16;
                doc.text(20, i, "personnels...) mis à disposition au producteur et l'équipe accompagnatrice. Enfin, l'organisateur");
                i += 16;
                doc.text(20, i, "certifie avoir souscrit les assurances en responsabilité civile couvrant les risques liés aux ");
                i += 16;
                doc.text(20, i, "représentations du spectacle lui-même.");
                i += 16;
                i += 16;
                doc.text(20, i, "f.  En matière de publicité et d'information, l'organisateur s'efforcera de respecter l'esprit général de ");
                i += 16;
                doc.text(20, i, "la documentation fournie par le producteur et observera scrupuleusement les mentions obligatoires. Le ");
                i += 16;
                doc.text(20, i, "prix des places sera fixé au libre choix de l'organisateur.");
                i += 16;
                i += 16;
                doc.text(20, i, "g.  En dehors des émissions radiophoniques ou télévisées d'une durée de trois minutes au plus, tout ");
                i += 16;
                doc.text(20, i, "enregistrement ou diffusion, même partiel, des représentations, objet du présent contrat, nécessite un");
                i += 16;
                doc.text(20, i, "accord particulier. L'organisateur prendra en outre les dispositions nécessaires afin qu'aucune prise ");
                i += 16;
                doc.text(20, i, "de vue (photo, vidéo,...) ou de son ne puise se faire sans l'accord exprès du producteur.");
                i += 16;
                i += 16;
                doc.text(20, i, "h.  Le présent contrat se trouverait suspendu ou annulé de plein droit et sans indemnité d'aucune sorte, ");
                i += 16;
                doc.text(20, i, "dans tous les cas reconnus de force majeure. On entend par cas de force majeure, des circonstances qui ");
                i += 16;
                doc.text(20, i, "se sont produites après la signature du contrat, en raison de fait d'un caractère imprévisible et ");
                i += 16;
                doc.text(20, i, "insurmontable et qui ne peuvent pas être causées par les contractants et notamment : catastrophes ");
                i += 16;
                doc.text(20, i, "naturelles, guerre, insurrection, incendie, grève des services publics, grève du personnel, maladie ");
                i += 16;
                doc.text(20, i, "d'un des artistes, certificat médical à l'appui et autres circonstances insurmontables dont ");
                i += 16;
                doc.text(20, i, "l'organisateur ou le producteur est responsable.");

                doc.addPage();

                i = 40;
                doc.text(20, i, "En cas de force majeure, le co-contractant empêché préviendra immédiatement l'autre partie afin de ");
                i += 16;
                doc.text(20, i, "suspendre le contrat, cette dernière se réservant le droit d'y mettre un terme sans indemnité d'aucune ");
                i += 16;
                doc.text(20, i, "sorte.");
                i += 16;
                i += 16;
                doc.text(20, i, "En cas de désir de reconduction du contrat, après cessation des circonstances qui empêchent son");
                i += 16;
                doc.text(20, i, "exécution, les deux parties se réservent une nouvelle négociation.");
                i += 16;
                i += 16;
                doc.text(20, i, "Au cas où des difficultés surviendraient entre les parties à propos de l'exécution ou de ");
                i += 16;
                doc.text(20, i, "l'interprétation du présent contrat, celles-ci s'engagent à d'abord coopérer pleinement avec diligence ");
                i += 16;
                doc.text(20, i, "et bonne foi en vue de trouver une solution amiable au litige.");
                i += 16;
                i += 16;
                doc.text(20, i, "Compétence juridique : en cas de recours judiciaire, les parties conviennent de s'en remettre à ");
                i += 16;
                doc.text(20, i, "l'appréciation des tribunaux de Tournai.");
                i += 16;
                i += 16;
                doc.text(20, i, "Le présent contrat entrera en vigueur à dater de sa signature par les deux parties, sous les conditions ");
                i += 16;
                doc.text(20, i, "expresses décrites en préambule et dans la fiche technique annexée au contrat");
                i += 16;
                doc.text(20, i, "Si vous ne pouviez réaliser tous les points fixés dans la fiche technique, prenez contact avec :");
                i += 16;
                i += 16;
                doc.text(40, i, "l'administrateur");
                i += 0;
                doc.text(200, i, "Frédéric Mariage");

                i += 16;
                doc.text(40, i, "notre régisseur général");
                i += 0;
                doc.text(200, i, "<?php echo (isset($steward_contact_item)) ? $steward_contact_item->name : '';?>");

                i += 16;
                doc.text(40, i, "notre ingénieur son");
                i += 0;
                doc.text(200, i, "<?php echo (isset($soundman_contact_item)) ? $soundman_contact_item->name : '';?>");

                i += 16;
                doc.text(40, i, "notre ingénieur lumière");
                i += 0;
                doc.text(200, i, "<?php echo (isset($speaker_contact_item)) ? $speaker_contact_item->name : '';?>");

                i += 16;
                doc.text(20, i, "Note complémentaire :");

                i += 10;
                doc.rect(40, i, 500, 100); // empty square

                i += 100;
                i += 16;
                i += 16;
                doc.text(20, i, "Fait à Tournai, le");
                i += 16;
                i += 16;
                doc.text(20, i, "Nombre de pages : 4 ");
                i += 16;
                doc.text(20, i, "Nombre d'annexe : ");
                i += 16;
                doc.text(20, i, "en ce compris la fiche technique : ");
                i += 16;
                i += 16;
                doc.text(20, i, "Le producteur");
                i += 0;
                doc.text(400, i, "L'organisateur");

                i += 16;
                doc.text(20, i, "Pour la Casa Palabre");
                i += 0;
                doc.text(400, i, "Pour <?php echo (isset($organizer_contact_item)) ? $organizer_contact_item->name : '';?>");

                i += 16;
                doc.text(20, i, "Frédéric Mariage");
                i += 0;
                doc.text(400, i, "<?php echo (isset($representative_contact_item)) ? $representative_contact_item->name : '';?>");

                i += 16;
                doc.text(20, i, "Administrateur");
                i += 0;
                doc.text(400, i, "");

                doc.setFontType('normal');
                doc.setFontSize(12);


                // Optional - set properties on the document
                doc.setProperties({
                    title: 'CONTRAT DE VENTE DE SPECTACLE',
                    subject: 'CONTRAT DE VENTE DE SPECTACLE',
                    author: 'CASAPALABRE, ASBL',
                    keywords: 'contrat',
                    creator: 'Allevents'
                });

                doc.save('Test.pdf');
            });

            $('#contact-save-button').click(function () {
                var data = {
                    jform: {
                        name: $('#contact_titre').val()
                    }
                };
                data[$('#contact_token').val()] = '1';
                data['ajax'] = '1';
                data['id'] = 0;
                $.ajax({
                    type: 'POST',
                    url: 'index.php?option=com_allevents&task=contact.save',
                    data: data,
                    success: function (data) {
                        var json = $.parseJSON(data);
                        Joomla.renderMessages(json.messages);
                        $('#contact-form').fadeToggle();
                    }
                });
            });

            $('#contact-cancel-button, #contact-activator').click(function () {
                $('#contact-form').fadeToggle();
            });

            $('#contact-form').hide();

        });
    })(jQuery);
</script>