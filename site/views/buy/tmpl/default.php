<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * event en front end
 */
// TODO: #3 : mettre en place un ordre d'affichage dans les paramètres de l'application
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperDataTable'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aedatatable.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

if (!class_exists('AllEventsContactDetailsLink'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecontactdetailslink.php';

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$document = JFactory::getDocument();
$lang = substr($document->language, 0, 2);

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css');

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
$document->addScript(AllEventsHelperOverride::GetScript('jquery.formtowizard.js'));
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js');

$order_id = 100;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

$app = JFactory::getApplication();
$this->itemid = (int)$app->input->getInt('Itemid', null);
$user = JFactory::getUser();
$authorised = $user->authorise('core.enrolment', 'com_allevents');
$root_url = JUri::root();
?>
<style>
    #SignupForm legend {
        font-size: 18px;
        margin: 0;
        padding: 10px 0;
        color: #b0232a;
        font-weight: bold;
    }

    #steps {
        margin: 80px 0 0 0;
    }

    .prev {
        float: left;
    }

    .next {
        float: right;
    }

    .steps {
        list-style: none;
        width: 100%;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .steps li {
        color: #b0b1b3;
        font-size: 24px;
        float: left;
        padding: 10px;
        transition: all .3s;
        -moz-transition: all .3s;
        -webkit-transition: all .3s;
        -o-transition: all .3s;
    }

    .steps li span {
        font-size: 11px;
        display: block;
    }

    .steps li.current {
        color: #000;
    }

    .breadcrumb {
        height: 37px;
    }

    .breadcrumb li {
        background: #eee;
        font-size: 14px;
    }

    .breadcrumb li.current:after {
        border-top: 18px solid transparent;
        border-bottom: 18px solid transparent;
        border-left: 6px solid #666;
        content: ' ';
        position: absolute;
        top: 0;
        right: -6px;
    }

    .breadcrumb li.current {
        background: #666;
        color: #eee;
        position: relative;
    }

    .breadcrumb li:last-child:after {
        border: none;
    }
</style>

<form id="SignupForm" action="">
    <fieldset>
        <legend><?php echo JText::_('AE_PAY_SELECT_TICKET'); ?></legend>


        <div id="event-info">
            <div id="event-info-tab" class="allevents-checkout-content checkout-first-step">
                <div class="">
                    <h4><?php echo JText::_('AE_PAY_EVENT_INFO'); ?></h4>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="no-more-tables">
                            <table cellspacing="0" cellpadding="5" width="98%" id=""
                                   class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
                                    <th><?php echo JText::_('COM_ALLEVENTS_EVENTS_DATE'); ?></th>
                                    <th><?php echo JText::_('AE_AVAILABLE_TICKETS'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-title="Event Name">
                                        <span style="margin-left:2%;"><?php echo $this->item->titre; ?></span>
                                    </td>

                                    <td data-title="Event Date">
<span style="margin-left:2%;">
<?php
if ($this->item->allday == "1") {
    echo '<i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($this->item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($this->item->enddate, $this->params['gdate_format']);
} else {
    echo '<i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($this->item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($this->item->enddate, $this->params['gdatetime_format']);
}
?>
</span>
                                    </td>
                                    <td data-title="Available Tickets">
                                        <span
                                            style="margin-left:2%;"><?php echo $this->item->available_tickets; ?></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4><?php echo JText::_('AE_PAY_TICKET_INFO'); ?></h4>
                        <div id="no-more-tables">
                            <table id="ticket_info_tab_table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo JText::_('AE_PAY_TICKET_TYPE'); ?></th>
                                    <th><?php echo JText::_('AE_PAY_TICKET_PRICE'); ?></th>
                                    <th><?php echo JText::_('AE_PAY_AVAILABLE_REGISTRATIONS'); ?></th>
                                    <th><?php echo JText::_('AE_PAY_NUMBER_OF_TICKETS_TO_BUY'); ?></th>
                                    <th><?php echo JText::_('AE_PAY_TOTAL_PRICE'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-title="Ticket Type"><input type="hidden" value="1" name="type_id[]"
                                                                        id="type_id[]"
                                                                        class="inputbox input-mini"><?php echo JText::_('AE_PAY_TICKET_UNIQUE'); ?>
                                    </td>
                                    <td data-title="Ticket Price">
                                        <div class="controls">
                                            <div class="input-append">
                                                <input readonly type="text" value="<?php echo $this->item->price; ?>"
                                                       class="input-small" name="price[1]" id="price_1">
                                                <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Available Registrations"><?php echo $this->item->available_tickets; ?> </td>
                                    <td data-title="No. of Tickets to Buy">
                                        <input type="text" value="0" onkeyup="checkforalpha(this)"
                                               class="input-small type_ticketcounts changesNo"
                                               name="type_ticketcount[1]" id="type_ticketcount_1">
                                    </td>
                                    <td data-title="Total Price">
                                        <div class="controls">
                                            <div class="input-append">
                                                <input readonly type="text" value="<?php echo $this->item->price; ?>"
                                                       class="input-small" name="total[1]" id="total_1">
                                                <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="text-align:right;" colspan="3">
                                        <b><?php echo JText::_('AE_PAY_TOTAL_AMOUNT'); ?></b>
                                    </td>
                                    <td>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input readonly type="text" value="<?php echo $this->item->price; ?>"
                                                       class="input-small" name="total_amt" id="total_amt">
                                                <span class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </fieldset>
    <fieldset>
        <legend><?php echo JText::_('AE_PAY_SELECT_BILLING_INFO'); ?></legend>
        <div id="step_billing_info" class="tab-pane step-pane active">
            <div class="row form-horizontal">
                <div id="jt_billmail_msg_div" class="form-group">
                    <span id="billmail_msg" class="help-inline"></span>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="fnam">First Name *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <input type="text" title="Enter First Name" name="bill[fnam]" size="32" maxlength="250" value=""
                               class="input-medium bill inputbox required validate-name" id="fnam" aria-required="true"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="lnam">Last Name *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <input type="text" title="Enter Last Name" name="bill[lnam]" size="32" maxlength="250" value=""
                               class="input-medium bill inputbox required validate-name" id="lnam" aria-required="true"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="email1">Email *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12"><input type="email" title="Enter a valid Email"
                                                                               name="bill[email1]" size="32"
                                                                               maxlength="250" value="user@example.com"
                                                                               onblur="allevents_chkbillmail(
                     'User Already exists. Please login or select checkout as a guest method',
                     '42');" class="input-medium bill inputbox required validate-email" id="email1" aria-required="true"
                                                                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="phon">Mobile Number
                        *</label>

                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <select data-chosen="com_allevents" class="" id="country_mobile_code"
                                name="bill[country_mobile_code]">
                            <option value="44" data-countrycode="GB">UK (+44)</option>
                            <option value="1" data-countrycode="US">USA (+1)</option>
                            <option value="213" data-countrycode="DZ">Algeria (+213)</option>
                            <option value="376" data-countrycode="AD">Andorra (+376)</option>
                            <option value="244" data-countrycode="AO">Angola (+244)</option>
                            <option value="1264" data-countrycode="AI">Anguilla (+1264)</option>
                            <option value="1268" data-countrycode="AG">Antigua &amp; Barbuda (+1268)</option>
                            <option value="54" data-countrycode="AR">Argentina (+54)</option>
                            <option value="374" data-countrycode="AM">Armenia (+374)</option>
                            <option value="297" data-countrycode="AW">Aruba (+297)</option>
                            <option value="61" data-countrycode="AU">Australia (+61)</option>
                            <option value="43" data-countrycode="AT">Austria (+43)</option>
                            <option value="994" data-countrycode="AZ">Azerbaijan (+994)</option>
                            <option value="1242" data-countrycode="BS">Bahamas (+1242)</option>
                            <option value="973" data-countrycode="BH">Bahrain (+973)</option>
                            <option value="880" data-countrycode="BD">Bangladesh (+880)</option>
                            <option value="1246" data-countrycode="BB">Barbados (+1246)</option>
                            <option value="375" data-countrycode="BY">Belarus (+375)</option>
                            <option value="32" data-countrycode="BE">Belgium (+32)</option>
                            <option value="501" data-countrycode="BZ">Belize (+501)</option>
                            <option value="229" data-countrycode="BJ">Benin (+229)</option>
                            <option value="1441" data-countrycode="BM">Bermuda (+1441)</option>
                            <option value="975" data-countrycode="BT">Bhutan (+975)</option>
                            <option value="591" data-countrycode="BO">Bolivia (+591)</option>
                            <option value="387" data-countrycode="BA">Bosnia Herzegovina (+387)</option>
                            <option value="267" data-countrycode="BW">Botswana (+267)</option>
                            <option value="55" data-countrycode="BR">Brazil (+55)</option>
                            <option value="673" data-countrycode="BN">Brunei (+673)</option>
                            <option value="359" data-countrycode="BG">Bulgaria (+359)</option>
                            <option value="226" data-countrycode="BF">Burkina Faso (+226)</option>
                            <option value="257" data-countrycode="BI">Burundi (+257)</option>
                            <option value="855" data-countrycode="KH">Cambodia (+855)</option>
                            <option value="237" data-countrycode="CM">Cameroon (+237)</option>
                            <option value="1" data-countrycode="CA">Canada (+1)</option>
                            <option value="238" data-countrycode="CV">Cape Verde Islands (+238)</option>
                            <option value="1345" data-countrycode="KY">Cayman Islands (+1345)</option>
                            <option value="236" data-countrycode="CF">Central African Republic (+236)</option>
                            <option value="56" data-countrycode="CL">Chile (+56)</option>
                            <option value="86" data-countrycode="CN">China (+86)</option>
                            <option value="57" data-countrycode="CO">Colombia (+57)</option>
                            <option value="269" data-countrycode="KM">Comoros (+269)</option>
                            <option value="242" data-countrycode="CG">Congo (+242)</option>
                            <option value="682" data-countrycode="CK">Cook Islands (+682)</option>
                            <option value="506" data-countrycode="CR">Costa Rica (+506)</option>
                            <option value="385" data-countrycode="HR">Croatia (+385)</option>
                            <option value="53" data-countrycode="CU">Cuba (+53)</option>
                            <option value="90392" data-countrycode="CY">Cyprus North (+90392)</option>
                            <option value="357" data-countrycode="CY">Cyprus South (+357)</option>
                            <option value="42" data-countrycode="CZ">Czech Republic (+42)</option>
                            <option value="45" data-countrycode="DK">Denmark (+45)</option>
                            <option value="253" data-countrycode="DJ">Djibouti (+253)</option>
                            <option value="1809" data-countrycode="DM">Dominica (+1809)</option>
                            <option value="1809" data-countrycode="DO">Dominican Republic (+1809)</option>
                            <option value="593" data-countrycode="EC">Ecuador (+593)</option>
                            <option value="20" data-countrycode="EG">Egypt (+20)</option>
                            <option value="503" data-countrycode="SV">El Salvador (+503)</option>
                            <option value="240" data-countrycode="GQ">Equatorial Guinea (+240)</option>
                            <option value="291" data-countrycode="ER">Eritrea (+291)</option>
                            <option value="372" data-countrycode="EE">Estonia (+372)</option>
                            <option value="251" data-countrycode="ET">Ethiopia (+251)</option>
                            <option value="500" data-countrycode="FK">Falkland Islands (+500)</option>
                            <option value="298" data-countrycode="FO">Faroe Islands (+298)</option>
                            <option value="679" data-countrycode="FJ">Fiji (+679)</option>
                            <option value="358" data-countrycode="FI">Finland (+358)</option>
                            <option value="33" data-countrycode="FR">France (+33)</option>
                            <option value="594" data-countrycode="GF">French Guiana (+594)</option>
                            <option value="689" data-countrycode="PF">French Polynesia (+689)</option>
                            <option value="241" data-countrycode="GA">Gabon (+241)</option>
                            <option value="220" data-countrycode="GM">Gambia (+220)</option>
                            <option value="7880" data-countrycode="GE">Georgia (+7880)</option>
                            <option value="49" data-countrycode="DE">Germany (+49)</option>
                            <option value="233" data-countrycode="GH">Ghana (+233)</option>
                            <option value="350" data-countrycode="GI">Gibraltar (+350)</option>
                            <option value="30" data-countrycode="GR">Greece (+30)</option>
                            <option value="299" data-countrycode="GL">Greenland (+299)</option>
                            <option value="1473" data-countrycode="GD">Grenada (+1473)</option>
                            <option value="590" data-countrycode="GP">Guadeloupe (+590)</option>
                            <option value="671" data-countrycode="GU">Guam (+671)</option>
                            <option value="502" data-countrycode="GT">Guatemala (+502)</option>
                            <option value="224" data-countrycode="GN">Guinea (+224)</option>
                            <option value="245" data-countrycode="GW">Guinea - Bissau (+245)</option>
                            <option value="592" data-countrycode="GY">Guyana (+592)</option>
                            <option value="509" data-countrycode="HT">Haiti (+509)</option>
                            <option value="504" data-countrycode="HN">Honduras (+504)</option>
                            <option value="852" data-countrycode="HK">Hong Kong (+852)</option>
                            <option value="36" data-countrycode="HU">Hungary (+36)</option>
                            <option value="354" data-countrycode="IS">Iceland (+354)</option>
                            <option value="91" data-countrycode="IN">India (+91)</option>
                            <option value="62" data-countrycode="ID">Indonesia (+62)</option>
                            <option value="98" data-countrycode="IR">Iran (+98)</option>
                            <option value="964" data-countrycode="IQ">Iraq (+964)</option>
                            <option value="353" data-countrycode="IE">Ireland (+353)</option>
                            <option value="972" data-countrycode="IL">Israel (+972)</option>
                            <option value="39" data-countrycode="IT">Italy (+39)</option>
                            <option value="1876" data-countrycode="JM">Jamaica (+1876)</option>
                            <option value="81" data-countrycode="JP">Japan (+81)</option>
                            <option value="962" data-countrycode="JO">Jordan (+962)</option>
                            <option value="7" data-countrycode="KZ">Kazakhstan (+7)</option>
                            <option value="254" data-countrycode="KE">Kenya (+254)</option>
                            <option value="686" data-countrycode="KI">Kiribati (+686)</option>
                            <option value="850" data-countrycode="KP">Korea North (+850)</option>
                            <option value="82" data-countrycode="KR">Korea South (+82)</option>
                            <option value="965" data-countrycode="KW">Kuwait (+965)</option>
                            <option value="996" data-countrycode="KG">Kyrgyzstan (+996)</option>
                            <option value="856" data-countrycode="LA">Laos (+856)</option>
                            <option value="371" data-countrycode="LV">Latvia (+371)</option>
                            <option value="961" data-countrycode="LB">Lebanon (+961)</option>
                            <option value="266" data-countrycode="LS">Lesotho (+266)</option>
                            <option value="231" data-countrycode="LR">Liberia (+231)</option>
                            <option value="218" data-countrycode="LY">Libya (+218)</option>
                            <option value="417" data-countrycode="LI">Liechtenstein (+417)</option>
                            <option value="370" data-countrycode="LT">Lithuania (+370)</option>
                            <option value="352" data-countrycode="LU">Luxembourg (+352)</option>
                            <option value="853" data-countrycode="MO">Macao (+853)</option>
                            <option value="389" data-countrycode="MK">Macedonia (+389)</option>
                            <option value="261" data-countrycode="MG">Madagascar (+261)</option>
                            <option value="265" data-countrycode="MW">Malawi (+265)</option>
                            <option value="60" data-countrycode="MY">Malaysia (+60)</option>
                            <option value="960" data-countrycode="MV">Maldives (+960)</option>
                            <option value="223" data-countrycode="ML">Mali (+223)</option>
                            <option value="356" data-countrycode="MT">Malta (+356)</option>
                            <option value="692" data-countrycode="MH">Marshall Islands (+692)</option>
                            <option value="596" data-countrycode="MQ">Martinique (+596)</option>
                            <option value="222" data-countrycode="MR">Mauritania (+222)</option>
                            <option value="269" data-countrycode="YT">Mayotte (+269)</option>
                            <option value="52" data-countrycode="MX">Mexico (+52)</option>
                            <option value="691" data-countrycode="FM">Micronesia (+691)</option>
                            <option value="373" data-countrycode="MD">Moldova (+373)</option>
                            <option value="377" data-countrycode="MC">Monaco (+377)</option>
                            <option value="976" data-countrycode="MN">Mongolia (+976)</option>
                            <option value="1664" data-countrycode="MS">Montserrat (+1664)</option>
                            <option value="212" data-countrycode="MA">Morocco (+212)</option>
                            <option value="258" data-countrycode="MZ">Mozambique (+258)</option>
                            <option value="95" data-countrycode="MN">Myanmar (+95)</option>
                            <option value="264" data-countrycode="NA">Namibia (+264)</option>
                            <option value="674" data-countrycode="NR">Nauru (+674)</option>
                            <option value="977" data-countrycode="NP">Nepal (+977)</option>
                            <option value="31" data-countrycode="NL">Netherlands (+31)</option>
                            <option value="687" data-countrycode="NC">New Caledonia (+687)</option>
                            <option value="64" data-countrycode="NZ">New Zealand (+64)</option>
                            <option value="505" data-countrycode="NI">Nicaragua (+505)</option>
                            <option value="227" data-countrycode="NE">Niger (+227)</option>
                            <option value="234" data-countrycode="NG">Nigeria (+234)</option>
                            <option value="683" data-countrycode="NU">Niue (+683)</option>
                            <option value="672" data-countrycode="NF">Norfolk Islands (+672)</option>
                            <option value="670" data-countrycode="NP">Northern Marianas (+670)</option>
                            <option value="47" data-countrycode="NO">Norway (+47)</option>
                            <option value="968" data-countrycode="OM">Oman (+968)</option>
                            <option value="680" data-countrycode="PW">Palau (+680)</option>
                            <option value="507" data-countrycode="PA">Panama (+507)</option>
                            <option value="675" data-countrycode="PG">Papua New Guinea (+675)</option>
                            <option value="595" data-countrycode="PY">Paraguay (+595)</option>
                            <option value="51" data-countrycode="PE">Peru (+51)</option>
                            <option value="63" data-countrycode="PH">Philippines (+63)</option>
                            <option value="48" data-countrycode="PL">Poland (+48)</option>
                            <option value="351" data-countrycode="PT">Portugal (+351)</option>
                            <option value="1787" data-countrycode="PR">Puerto Rico (+1787)</option>
                            <option value="974" data-countrycode="QA">Qatar (+974)</option>
                            <option value="262" data-countrycode="RE">Reunion (+262)</option>
                            <option value="40" data-countrycode="RO">Romania (+40)</option>
                            <option value="7" data-countrycode="RU">Russia (+7)</option>
                            <option value="250" data-countrycode="RW">Rwanda (+250)</option>
                            <option value="378" data-countrycode="SM">San Marino (+378)</option>
                            <option value="239" data-countrycode="ST">Sao Tome &amp; Principe (+239)</option>
                            <option value="966" data-countrycode="SA">Saudi Arabia (+966)</option>
                            <option value="221" data-countrycode="SN">Senegal (+221)</option>
                            <option value="381" data-countrycode="CS">Serbia (+381)</option>
                            <option value="248" data-countrycode="SC">Seychelles (+248)</option>
                            <option value="232" data-countrycode="SL">Sierra Leone (+232)</option>
                            <option value="65" data-countrycode="SG">Singapore (+65)</option>
                            <option value="421" data-countrycode="SK">Slovak Republic (+421)</option>
                            <option value="386" data-countrycode="SI">Slovenia (+386)</option>
                            <option value="677" data-countrycode="SB">Solomon Islands (+677)</option>
                            <option value="252" data-countrycode="SO">Somalia (+252)</option>
                            <option value="27" data-countrycode="ZA">South Africa (+27)</option>
                            <option value="34" data-countrycode="ES">Spain (+34)</option>
                            <option value="94" data-countrycode="LK">Sri Lanka (+94)</option>
                            <option value="290" data-countrycode="SH">St. Helena (+290)</option>
                            <option value="1869" data-countrycode="KN">St. Kitts (+1869)</option>
                            <option value="1758" data-countrycode="SC">St. Lucia (+1758)</option>
                            <option value="249" data-countrycode="SD">Sudan (+249)</option>
                            <option value="597" data-countrycode="SR">Suriname (+597)</option>
                            <option value="268" data-countrycode="SZ">Swaziland (+268)</option>
                            <option value="46" data-countrycode="SE">Sweden (+46)</option>
                            <option value="41" data-countrycode="CH">Switzerland (+41)</option>
                            <option value="963" data-countrycode="SI">Syria (+963)</option>
                            <option value="886" data-countrycode="TW">Taiwan (+886)</option>
                            <option value="7" data-countrycode="TJ">Tajikstan (+7)</option>
                            <option value="66" data-countrycode="TH">Thailand (+66)</option>
                            <option value="228" data-countrycode="TG">Togo (+228)</option>
                            <option value="676" data-countrycode="TO">Tonga (+676)</option>
                            <option value="1868" data-countrycode="TT">Trinidad &amp; Tobago (+1868)</option>
                            <option value="216" data-countrycode="TN">Tunisia (+216)</option>
                            <option value="90" data-countrycode="TR">Turkey (+90)</option>
                            <option value="7" data-countrycode="TM">Turkmenistan (+7)</option>
                            <option value="993" data-countrycode="TM">Turkmenistan (+993)</option>
                            <option value="1649" data-countrycode="TC">Turks &amp; Caicos Islands (+1649)</option>
                            <option value="688" data-countrycode="TV">Tuvalu (+688)</option>
                            <option value="256" data-countrycode="UG">Uganda (+256)</option>
                            <option value="380" data-countrycode="UA">Ukraine (+380)</option>
                            <option value="971" data-countrycode="AE">United Arab Emirates (+971)</option>
                            <option value="598" data-countrycode="UY">Uruguay (+598)</option>
                            <option value="7" data-countrycode="UZ">Uzbekistan (+7)</option>
                            <option value="678" data-countrycode="VU">Vanuatu (+678)</option>
                            <option value="379" data-countrycode="VA">Vatican City (+379)</option>
                            <option value="58" data-countrycode="VE">Venezuela (+58)</option>
                            <option value="84" data-countrycode="VN">Vietnam (+84)</option>
                            <option value="84" data-countrycode="VG">Virgin Islands - British (+1284)</option>
                            <option value="84" data-countrycode="VI">Virgin Islands - US (+1340)</option>
                            <option value="681" data-countrycode="WF">Wallis &amp; Futuna (+681)</option>
                            <option value="969" data-countrycode="YE">Yemen (North)(+969)</option>
                            <option value="967" data-countrycode="YE">Yemen (South)(+967)</option>
                            <option value="260" data-countrycode="ZM">Zambia (+260)</option>
                            <option value="263" data-countrycode="ZW">Zimbabwe (+263)</option>
                        </select>
                        <input type="text"
                               title="Enter Mobile Number. Select country code and enter mobile no without country code"
                               name="bill[phon]" size="32" value="" maxlength="50" onkeyup="checkforalpha(this,43);"
                               class="input-small bill inputbox required validate-integer" id="phon"
                               aria-required="true" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="addr">Address *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <textarea title="Enter Address" rows="3" maxlength="250" name="bill[addr]" class="required"
                                  id="addr" aria-required="true" required="required"></textarea>
                        <p class="help-block">Maximum Limit : 250 characters </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="zip">Zip Code *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <input type="text" title="Enter your Zip Code" name="bill[zip]" size="32" maxlength="20"
                               onblur="" value="" class="input-small bill inputbox required " id="zip"
                               aria-required="true" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="country">Country *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <select onchange="allevents_generateState('country','',1)" size="1"
                                aria-invalid="false" required="required" class="chzn-done jt_select bill"
                                name="bill[country]" id="country" data-chosen="com_allevents">
                            <option value="">Select Country</option>
                            <option selected="selected" value="1">Afghanistan</option>
                            <option value="2">Albania</option>
                            <option value="3">Algeria</option>
                            <option value="4">American Samoa</option>
                            <option value="5">Andorra</option>
                            <option value="6">Angola</option>
                            <option value="7">Anguilla</option>
                            <option value="8">Antarctica</option>
                            <option value="9">Antigua And Barbuda</option>
                            <option value="10">Argentina</option>
                            <option value="11">Armenia</option>
                            <option value="12">Aruba</option>
                            <option value="13">Australia</option>
                            <option value="14">Austria</option>
                            <option value="15">Azerbaijan</option>
                            <option value="16">Bahamas</option>
                            <option value="17">Bahrain</option>
                            <option value="18">Bangladesh</option>
                            <option value="19">Barbados</option>
                            <option value="20">Belarus</option>
                            <option value="21">Belgium</option>
                            <option value="22">Belize</option>
                            <option value="23">Benin</option>
                            <option value="24">Bermuda</option>
                            <option value="25">Bhutan</option>
                            <option value="26">Bolivia, PLURINATIONAL STATE OF</option>
                            <option value="27">Bosnia And Herzegovina</option>
                            <option value="28">Botswana</option>
                            <option value="29">Bouvet Island</option>
                            <option value="30">Brazil</option>
                            <option value="31">British Indian Ocean Territory</option>
                            <option value="32">Brunei Darussalam</option>
                            <option value="33">Bulgaria</option>
                            <option value="34">Burkina Faso</option>
                            <option value="35">Burundi</option>
                            <option value="36">Cambodia</option>
                            <option value="37">Cameroon</option>
                            <option value="38">Canada</option>
                            <option value="39">Cape Verde</option>
                            <option value="40">Cayman Islands</option>
                            <option value="41">Central African Republic</option>
                            <option value="42">Chad</option>
                            <option value="43">Chile</option>
                            <option value="44">China</option>
                            <option value="45">Christmas Island</option>
                            <option value="46">Cocos (KEELING) Islands</option>
                            <option value="47">Colombia</option>
                            <option value="48">Comoros</option>
                            <option value="49">Congo</option>
                            <option value="50">Cook Islands</option>
                            <option value="51">Costa Rica</option>
                            <option value="52">Ivory Coast</option>
                            <option value="53">Croatia</option>
                            <option value="54">Cuba</option>
                            <option value="55">Cyprus</option>
                            <option value="56">Czech Republic</option>
                            <option value="57">Denmark</option>
                            <option value="58">Djibouti</option>
                            <option value="59">Dominica</option>
                            <option value="60">Dominican Republic</option>
                            <option value="62">Ecuador</option>
                            <option value="63">Egypt</option>
                            <option value="64">El Salvador</option>
                            <option value="65">Equatorial Guinea</option>
                            <option value="66">Eritrea</option>
                            <option value="67">Estonia</option>
                            <option value="68">Ethiopia</option>
                            <option value="69">Falkland Islands (MALVINAS)</option>
                            <option value="70">Faroe Islands</option>
                            <option value="71">Fiji</option>
                            <option value="72">Finland</option>
                            <option value="73">France</option>
                            <option value="75">French Guiana</option>
                            <option value="76">French Polynesia</option>
                            <option value="77">French Southern Territories</option>
                            <option value="78">Gabon</option>
                            <option value="79">Gambia</option>
                            <option value="80">Georgia</option>
                            <option value="81">Germany</option>
                            <option value="82">Ghana</option>
                            <option value="83">Gibraltar</option>
                            <option value="84">Greece</option>
                            <option value="85">Greenland</option>
                            <option value="86">Grenada</option>
                            <option value="87">Guadeloupe</option>
                            <option value="88">Guam</option>
                            <option value="89">Guatemala</option>
                            <option value="90">Guinea</option>
                            <option value="91">Guinea-Bissau</option>
                            <option value="92">Guyana</option>
                            <option value="93">Haiti</option>
                            <option value="94">Heard Island And Mcdonald Islands</option>
                            <option value="95">Honduras</option>
                            <option value="96">Hong Kong</option>
                            <option value="97">Hungary</option>
                            <option value="98">Iceland</option>
                            <option value="99">India</option>
                            <option value="100">Indonesia</option>
                            <option value="101">Iran, Islamic Republic Of</option>
                            <option value="102">Iraq</option>
                            <option value="103">Ireland</option>
                            <option value="104">Israel</option>
                            <option value="105">Italy</option>
                            <option value="106">Jamaica</option>
                            <option value="107">Japan</option>
                            <option value="108">Jordan</option>
                            <option value="109">Kazakhstan</option>
                            <option value="110">Kenya</option>
                            <option value="111">Kiribati</option>
                            <option value="112">Korea, Democratic People\'s Republic Of</option>
                            <option value="113">Korea, Republic Of</option>
                            <option value="114">Kuwait</option>
                            <option value="115">Kyrgyzstan</option>
                            <option value="116">Lao People\'s Democratic Republic</option>
                            <option value="117">Latvia</option>
                            <option value="118">Lebanon</option>
                            <option value="119">Lesotho</option>
                            <option value="120">Liberia</option>
                            <option value="121">Libyan Arab Jamahiriya</option>
                            <option value="122">Liechtenstein</option>
                            <option value="123">Lithuania</option>
                            <option value="124">Luxembourg</option>
                            <option value="125">Macao</option>
                            <option value="126">Macedonia, The Former Yugoslav Republic Of</option>
                            <option value="127">Madagascar</option>
                            <option value="128">Malawi</option>
                            <option value="129">Malaysia</option>
                            <option value="130">Maldives</option>
                            <option value="131">Mali</option>
                            <option value="132">Malta</option>
                            <option value="133">Marshall Islands</option>
                            <option value="134">Martinique</option>
                            <option value="135">Mauritania</option>
                            <option value="136">Mauritius</option>
                            <option value="137">Mayotte</option>
                            <option value="138">Mexico</option>
                            <option value="139">Micronesia, Federated States Of</option>
                            <option value="140">Moldova, Republic Of</option>
                            <option value="141">Monaco</option>
                            <option value="142">Mongolia</option>
                            <option value="143">Montserrat</option>
                            <option value="144">Morocco</option>
                            <option value="145">Mozambique</option>
                            <option value="146">Myanmar</option>
                            <option value="147">Namibia</option>
                            <option value="148">Nauru</option>
                            <option value="149">Nepal</option>
                            <option value="150">Netherlands</option>
                            <option value="151">Netherlands Antilles</option>
                            <option value="152">New Caledonia</option>
                            <option value="153">New Zealand</option>
                            <option value="154">Nicaragua</option>
                            <option value="155">Niger</option>
                            <option value="156">Nigeria</option>
                            <option value="157">Niue</option>
                            <option value="158">Norfolk Island</option>
                            <option value="159">Northern Mariana Islands</option>
                            <option value="160">Norway</option>
                            <option value="161">Oman</option>
                            <option value="162">Pakistan</option>
                            <option value="163">Palau</option>
                            <option value="164">Panama</option>
                            <option value="165">Papua New Guinea</option>
                            <option value="166">Paraguay</option>
                            <option value="167">Peru</option>
                            <option value="168">Philippines</option>
                            <option value="169">Pitcairn</option>
                            <option value="170">Poland</option>
                            <option value="171">Portugal</option>
                            <option value="172">Puerto Rico</option>
                            <option value="173">Qatar</option>
                            <option value="174">Reunion</option>
                            <option value="175">Romania</option>
                            <option value="176">Russian Federation</option>
                            <option value="177">Rwanda</option>
                            <option value="178">Saint Kitts And Nevis</option>
                            <option value="179">Saint Lucia</option>
                            <option value="180">Saint Vincent And The Grenadines</option>
                            <option value="181">Samoa</option>
                            <option value="182">San Marino</option>
                            <option value="183">Sao Tome And Principe</option>
                            <option value="184">Saudi Arabia</option>
                            <option value="185">Senegal</option>
                            <option value="186">Seychelles</option>
                            <option value="187">Sierra Leone</option>
                            <option value="188">Singapore</option>
                            <option value="189">Slovakia</option>
                            <option value="190">Slovenia</option>
                            <option value="191">Solomon Islands</option>
                            <option value="192">Somalia</option>
                            <option value="193">South Africa</option>
                            <option value="194">South Georgia And The South Sandwich Islands</option>
                            <option value="195">Spain</option>
                            <option value="196">Sri Lanka</option>
                            <option value="197">Saint Helena, Ascension And Tristan Da Cunha</option>
                            <option value="198">Saint Pierre And Miquelon</option>
                            <option value="199">Sudan</option>
                            <option value="200">Suriname</option>
                            <option value="201">Svalbard And Jan Mayen</option>
                            <option value="202">Swaziland</option>
                            <option value="203">Sweden</option>
                            <option value="204">Switzerland</option>
                            <option value="205">Syrian Arab Republic</option>
                            <option value="206">Taiwan, Province Of China</option>
                            <option value="207">Tajikistan</option>
                            <option value="208">Tanzania, United Republic Of</option>
                            <option value="209">Thailand</option>
                            <option value="210">Togo</option>
                            <option value="211">Tokelau</option>
                            <option value="212">Tonga</option>
                            <option value="213">Trinidad And Tobago</option>
                            <option value="214">Tunisia</option>
                            <option value="215">Turkey</option>
                            <option value="216">Turkmenistan</option>
                            <option value="217">Turks And Caicos Islands</option>
                            <option value="218">Tuvalu</option>
                            <option value="219">Uganda</option>
                            <option value="220">Ukraine</option>
                            <option value="221">United Arab Emirates</option>
                            <option value="222">United Kingdom</option>
                            <option value="223">United States</option>
                            <option value="224">United States Minor Outlying Islands</option>
                            <option value="225">Uruguay</option>
                            <option value="226">Uzbekistan</option>
                            <option value="227">Vanuatu</option>
                            <option value="228">Holy See (VATICAN CITY STATE)</option>
                            <option value="229">Venezuela, Bolivarian Republic Of</option>
                            <option value="230">Vietnam</option>
                            <option value="231">Virgin Islands, British</option>
                            <option value="232">Virgin Islands, U.S.</option>
                            <option value="233">Wallis And Futuna</option>
                            <option value="234">Western Sahara</option>
                            <option value="235">Yemen</option>
                            <option value="237">Congo, The Democratic Republic Of The</option>
                            <option value="238">Zambia</option>
                            <option value="239">Zimbabwe</option>
                            <option value="241">Jersey</option>
                            <option value="242">Saint Barthelemy</option>
                            <option value="245">Åland Islands</option>
                            <option value="246">Guernsey</option>
                            <option value="247">Saint Martin</option>
                            <option value="248">Timor-Leste</option>
                            <option value="249">Serbia</option>
                            <option value="250">Isle Of Man</option>
                            <option value="251">Montenegro</option>
                            <option value="252">Palestinian Territory, Occupied</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="state">State </label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <select size="1" aria-invalid="false" class="chzn-done jt_select bill" name="bill[state]"
                                id="state" data-chosen="com_allevents">

                            <option value="" selected="selected">Select State</option>
                            <option value="1">Badakhshan</option>
                            <option value="2">Badghis</option>
                            <option value="3">Baghlan</option>
                            <option value="4">Bamian</option>
                            <option value="5">Farah</option>
                            <option value="6">Faryab</option>
                            <option value="7">Ghazni</option>
                            <option value="8">Ghowr</option>
                            <option value="9">Helmand</option>
                            <option value="10">Herat</option>
                            <option value="11">Kabol</option>
                            <option value="12">Kapisa</option>
                            <option value="13">Lowgar</option>
                            <option value="14">Nangarhar</option>
                            <option value="15">Nimruz</option>
                            <option value="16">Kandahar</option>
                            <option value="17">Kondoz</option>
                            <option value="18">Takhar</option>
                            <option value="19">Vardak</option>
                            <option value="20">Zabol</option>
                            <option value="21">Paktika</option>
                            <option value="22">Balkh</option>
                            <option value="23">Jowzjan</option>
                            <option value="24">Samangan</option>
                            <option value="25">Sar-e Pol</option>
                            <option value="26">Konar</option>
                            <option value="27">Laghman</option>
                            <option value="28">Paktia</option>
                            <option value="29">Khowst</option>
                            <option value="30">Nurestan</option>
                            <option value="31">Oruzgan</option>
                            <option value="32">Parvan</option>
                            <option value="33">Daykondi</option>
                            <option value="34">Panjshir</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="city">City *</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <input type="text" title="Enter your City" name="bill[city]" size="32" maxlength="250" value=""
                               class="input-medium bill inputbox required validate-name" id="city" aria-required="true"
                               required="required">
                    </div>
                </div>
                <div class="form-group ">
                    <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12  control-label" for="">Customer Note</label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <textarea name="jt_comment" maxlength="135" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <!-- END OF row-->
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo JText::_('AE_PAY_SELECT_PAY'); ?></legend>
        <div id="payment-info" class="allevents-checkout-steps form-horizontal">
            <div class="">
                <div class="paymentHTMLWrapper ">
                    <hr class="hr hr-condensed"/>
                    <div class="">
                        <?php
                        $default = "";
                        $lable = JText::_('COM_ALLEVENTS_SEL_GATEWAY');
                        $gateway_div_style = 1;
                        if (!empty($this->gateways)) //if only one geteway then keep it as selected
                        {
                            $default = $this->gateways[0]->id; // id and value is same
                        }
                        if (!empty($this->gateways) && count($this->gateways) == 1) //if only one geteway then keep it as selected
                        {
                            $default = $this->gateways[0]->id; // id and value is same
                            $lable = JText::_('COM_ALLEVENTS_SEL_GATEWAY');
                            $gateway_div_style = 1;
                        }
                        ?>
                        <h4><?php echo $lable ?> </h4>
                        <div class="container-fluid"
                             style="<?php echo ($gateway_div_style == 1) ? "" : "display:none;" ?>">
                            <?php
                            if (empty($this->gateways))
                                echo JText::_('COM_ALLEVENTS_NO_PAYMENT_GATEWAY');
                            else {
                                $ad_fun = "onChange=gatewayHtml(this.value,$order_id)";
                                $pg_list = JHtml::_('select.radiolist', $this->gateways, 'gateways', 'class="radio gatewaylabel required" ' . $ad_fun . '  ', 'id', 'name', '', false);
                                echo $pg_list;
                            }
                            ?>
                        </div>
                        <?php
                        if (empty($gateway_div_style)) {
                            ?>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 qtc_left_top">
                                <?php echo $this->gateways[0]->name; // id and value is same 
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <hr class="hr hr-condensed"/>
                        <div id="allevents-payHtmlDiv"></div>
                        <!-- show payment hmtl form-->
                    </div>
                    <!-- end of paymentHTMLWrapper-->
                </div>
                <!-- show payment option end -->
            </div>
        </div>
    </fieldset>
    <p>
        <input id="SaveAccount" type="button" value="Submit form"/>
    </p>
</form>

<script>
    var root_url = "<?php    echo $root_url;     ?>";
    var loadingMsg = "Loading..";

    (function ($) {
        $(document).ready(function () {
            var $signupForm = $('#SignupForm');

            $signupForm.validationEngine();

            $signupForm.formToWizard({
                submitButton: 'SaveAccount',
                showProgress: true, //default value for showProgress is also true
                nextBtnName: '<?php echo JText::_('COM_ALLEVENTS_NEXT') . ' >> '; ?>',
                prevBtnName: '<?php echo ' << ' . JText::_('COM_ALLEVENTS_PREV'); ?>',
                showStepNo: false,
                validateBeforeNext: function () {
                    return $signupForm.validationEngine('validate');
                }
            });

            $('#txt_stepNo').change(function () {
                $signupForm.formToWizard('GotoStep', $(this).val());
            });

            $('#btn_next').click(function () {
                $signupForm.formToWizard('NextStep');
            });

            $('#btn_prev').click(function () {
                $signupForm.formToWizard('PreviousStep');
            });

            $('#ticket_total_price1').val(parseFloat(0.0).toFixed(2));
            $('#ticket_total_price1').val(parseFloat( <?php echo $this->item->price;  ?> ).toFixed(2));

//price change
            $(document).on('change keyup blur', '.changesNo', function () {
                var quantity = $('#type_ticketcount_1').val();
                var price = $('#price_1').val();
                if (quantity != '' && price != '') {
                    $('#total_1').val((parseFloat(price) * parseFloat(quantity)).toFixed(2));
                }
                calculateTotal();
            });

//total price calculation
            function calculateTotal() {
                $('#total_amt').val($('#total_1').val());
            }
        });
    })(jQuery);

    function checkforalpha(el) {
        var i = 0;
        for (i = 0; i < el.value.length; i++) {
            if ((el.value.charCodeAt(i) > 64 && el.value.charCodeAt(i) < 92) || (el.value.charCodeAt(i) > 96 && el.value.charCodeAt(i) < 123)) {
                alert("<?php echo JText::_('AE_PAY_CHECKFORALPHA_1'); ?>");
                el.value = el.value.substring(0, i);
                break;
            }
        }

        if (el.value < 0) {
            alert("<?php echo JText::_('AE_PAY_CHECKFORALPHA_2'); ?>");
        }

        if (el.value % 1 !== 0) {
            alert("<?php echo JText::_('AE_PAY_CHECKFORALPHA_3'); ?>");
            el.value = 0;
            return false

        }
    }
    function gatewayHtml(ele, orderid) {

        var prev_button_html = '<button id="btnWizardPrev1" onclick="jQuery(\'#MyWizard\').wizard(\'previous\');"type="button" class="btn  btn-default  btn-prev pull-left" > <i class="icon-arrow-left" ></i>Prev</button>';

        jQuery.ajax({
            beforeSend: function () {
                jQuery('#allevents-payHtmlDiv').before('<div class=\"com_allevents_ajax_loading\"><div class=\"com_allevents_ajax_loading_text\">' + loadingMsg + ' ...</div><img class=\"com_socialad_ajax_loading_img\" src="' + root_url + 'components/com_allevents/assets/images/loading_data.gif"></div>');

            },
            complete: function () {
                jQuery('.com_allevents_ajax_loading').remove();

            },
            url: root_url + '?option=com_allevents&task=payment.changegateway&gateways=' + ele + '&order_id=' + orderid + '&tmpl=component',
            type: 'POST',
            data: '',
            dataType: 'text',
            success: function (data) {
                if (data) {
                    jQuery('#allevents-payHtmlDiv').html(data);
                    jQuery('#allevents-payHtmlDiv div.form-actions').prepend(prev_button_html);
                    jQuery('#allevents-payHtmlDiv div.form-actions input[type="submit"]').addClass('pull-right');

                }
            }
        });
    }
    //It restrict the non-numbers
    var specialKeys = [];
    specialKeys.push(8, 46); //Backspace
    function IsNumeric(e) {
        var keyCode = e.which ? e.which : e.keyCode;
        console.log(keyCode);
        return ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    }
</script>