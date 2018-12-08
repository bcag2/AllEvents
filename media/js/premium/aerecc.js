(function ($) {
    $(document).ready(function () {
        $('#scheduling-options, #jform_scheduling_monthly_options').bind('click', function (e) {
            changeVisiblity();
            if (!$('#jform_scheduling0')[0].checked) {
                updateRuleFromForm();
            }
        });
        $('#jform_scheduling_end_date, #jform_scheduling_interval, #jform_scheduling_repeat_count').bind('change', function () {
            if (!$('#jform_scheduling0')[0].checked) {
                updateRuleFromForm();
            }
        });
        $('#jform_date, #jform_enddate').bind('change', function () {
            var monmoment = moment($('#jform_date').val(), AEdateFormat).add(6, 'months').format(AEdateFormat);
            if (!$('#jform_scheduling0')[0].checked) {
                updateRuleFromForm();
            }
        });

        $('#jform_scheduling_daily_weekdays, #jform_scheduling_weekly_days, #jform_scheduling_monthly_days, #jform_scheduling_monthly_week, #jform_scheduling_monthly_week_days').bind('click', function () {
            if (!$('#jform_scheduling0')[0].checked) {
                updateRuleFromForm();
            }
        });
        $('#jform_rrule').bind('change', function (e) {
            if (!$('#jform_scheduling0')[0].checked) {
                updateRuleFromForm();
            }
        });
        updateFormFromRule();

        $('#scheduling-expert-button').click(function () {
            $('#scheduling-rrule').fadeToggle();
        });
        $('#scheduling-rrule').hide();
    });

    function updateFormFromRule() {
        if ($('#jform_rrule').val() == undefined) {
            return;
        }
        var frequency = null;
        $.each($('#jform_rrule').val().split(';'), function () {
            var parts = this.split('=');
            if (parts.length > 1) {
                switch (parts[0]) {
                    case 'FREQ':
                        $('#jform_scheduling').find('input').each(function () {
                            var sched = $(this);
                            if (parts[1] == sched.val()) {
                                sched.attr('checked', 'checked');
                                if (parts[1] == '0') {
                                    $('#jform_scheduling').find('label[for="' + sched.attr('id') + '"]').attr('class', 'btn active btn-danger');
                                } else {
                                    $('#jform_scheduling').find('label[for="' + sched.attr('id') + '"]').attr('class', 'btn active btn-success');
                                    frequency = sched.val();
                                }
                            } else {
                                $('#jform_scheduling').find('label[for="' + sched.attr('id') + '"]').attr('class', 'btn');
                            }
                        });
                        break;
                    case 'BYDAY':
                        $.each(parts[1].split(','), function () {
                            if (frequency == 'MONTHLY') {
                                var pos = this.length;
                                var day = this.substring(pos - 2, pos);
                                var week = this.substring(0, pos - 2);

                                if (week == -1) {
                                    week = 'last';
                                }

                                $('#jform_scheduling_monthly_week').find('input[value="' + week + '"]').attr('checked', 'checked');
                                $('#jform_scheduling_monthly_week_days').find('input[value="' + day + '"]').attr('checked', 'checked');
                            } else {
                                $('#jform_scheduling_weekly_days').find('input[value="' + this + '"]').attr('checked', 'checked');
                            }
                        });
                        break;
                    case 'BYMONTHDAY':
                        $('#jform_scheduling_monthly_options').find('input[value="by_day"]').attr('checked', 'checked');
                        $('#jform_scheduling_monthly_options').find('label[for="jform_scheduling_monthly_options0"]').attr('class', 'btn active btn-success');
                        $('#jform_scheduling_monthly_options').find('label[for="jform_scheduling_monthly_options1"]').attr('class', 'btn');
                        $.each(parts[1].split(','), function () {
                            $('#jform_scheduling_monthly_days').find('input[value="' + this + '"]').attr('checked', 'checked');
                        });
                        break;
                    case 'COUNT':
                        $('#jform_scheduling_repeat_count').val(parts[1]);
                        break;
                    case 'INTERVAL':
                        $('#jform_scheduling_interval').val(parts[1]);
                        break;
                    case 'UNTIL':
                        var t = parts[1];
                        $('#jform_scheduling_end_date').val(t.substring(0, 4) + '-' + t.substring(4, 6) + '-' + t.substring(6, 8));
                        break;
                }
            }
        });
        changeVisiblity();
    }

    function updateRuleFromForm() {
        var rule = '';
        if ($('#jform_scheduling1')[0].checked) {
            rule = 'FREQ=DAILY';
            if ($('#jform_scheduling_daily_weekdays0')[0].checked) {
                rule = 'FREQ=WEEKLY;BYDAY=MO,TU,WE,TH,FR';
            }
        }
        if ($('#jform_scheduling2')[0].checked) {
            rule = 'FREQ=WEEKLY';

            var boxes = $('#jform_scheduling_weekly_days').find(':input:checked');
            if (boxes.length > 0) {
                rule += ';BYDAY=';
                boxes.each(function () {
                    rule += $(this).val() + ',';
                });
                rule = rule.slice(0, -1);
            }
        }
        if ($('#jform_scheduling3')[0].checked) {
            rule = 'FREQ=MONTHLY';
            if ($('#jform_scheduling_monthly_options0')[0].checked) {
                var boxes = $('#jform_scheduling_monthly_days').find(':input:checked');
                if (boxes.length > 0) {
                    rule += ';BYMONTHDAY=';
                    boxes.each(function () {
                        rule += $(this).val() + ',';
                    });
                    rule = rule.slice(0, -1);
                }
            } else {
                var weeks = $('#jform_scheduling_monthly_week').find(':input:checked');
                var trim = false;
                if (weeks.length > 0) {
                    rule += ';BYDAY=';
                    weeks.each(function () {
                        var days = $('#jform_scheduling_monthly_week_days').find(':input:checked');
                        if (days.length > 0) {
                            var week = $(this).val();
                            if (week == 'last') {
                                week = -1;
                            }
                            days.each(function () {
                                rule += week + $(this).val() + ',';
                                trim = true;
                            });
                        }
                    });
                    if (trim) {
                        rule = rule.slice(0, -1);
                    }
                }
            }
        }
        if ($('#jform_scheduling4')[0].checked) {
            rule = 'FREQ=YEARLY';
        }

        // DTSTART=20151002T103000Z;
        console.log(AEdateFormat + ' ' + AEtimeFormat);
        console.log($('#jform_date').val()) ;
        var monmoment = moment($('#jform_date').val(), AEdateFormat + ' ' + AEtimeFormat);
        monmoment = monmoment.zone(AEtimezone);
        rule += ';DTSTART=' + monmoment.format('YYYYMMDDTHHmmss') + 'Z';

        if (rule.length > 1) {
            var interval = $('#jform_scheduling_interval').val();
            if (interval > 0) {
                rule += ';INTERVAL=' + interval;
            }
            var count = $('#jform_scheduling_repeat_count').val();
            if (count > 0) {
                rule += ';COUNT=' + count;
            }
            if ($('#jform_scheduling_end_date').val() !== '') {
                monmoment = moment($('#jform_scheduling_end_date').val(), AEdateFormat);
                monmoment = monmoment.zone(AEtimezone);
                rule += ';UNTIL=' + monmoment.format('YYYYMMDDTHHmmss') + 'Z';
            }
        }
        $('#jform_rrule').val(rule);
        if ($('#jform_rrule').val() !== "") {
            var myrule = new RRule.fromString(rule);
            //$('#jform_rruletotext').val(myrule.toText(gettext, datepicker_regional_fr));
            // $('#jform_rruletotext').val(myrule.toText());

            var max = 300;
            var dates = myrule.all(function (date, i) {
                return !(!myrule.options.count && i === max);

            });
            var html = makeRows(dates);
            // if (!myrule.options.count) {
            // html += "<tr><td colspan='7'><em>Showing first " + max + " dates, set\n<code>count</code> to see more.</em></td></tr>";
            // }
            $("#eventdates").html(html);
        }
    }

    function changeVisiblity() {
        if ($('#jform_scheduling0')[0].checked) {
            $('#scheduling-options-start').hide();
            $('#scheduling-options-end').hide();
            $('#scheduling-options-interval').hide();
            $('#scheduling-options-repeat_count').hide();
            $('#scheduling-expert-button').hide();
            $('#scheduling-rrule').hide();
        } else {
            $('#scheduling-options-start').show();
            $('#scheduling-options-end').show();
            $('#scheduling-options-interval').show();
            $('#scheduling-options-repeat_count').show();
            $('#scheduling-expert-button').show();
            $('#scheduling-rrule').show();
        }
        if ($('#jform_scheduling1')[0].checked) {
            $('#scheduling-options-day').show();
        } else {
            $('#scheduling-options-day').hide();
        }
        if ($('#jform_scheduling2')[0].checked) {
            $('#scheduling-options-week').show();
        } else {
            $('#scheduling-options-week').hide();
        }
        if ($('#jform_scheduling3')[0].checked) {
            $('.scheduling-options-month').show();
            if ($('#jform_scheduling_monthly_options0')[0].checked) {
                $('#scheduling-options-month-week').hide();
                $('#scheduling-options-month-week-days').hide();
                $('#scheduling-options-month-days').show();
            } else {
                $('#scheduling-options-month-week').show();
                $('#scheduling-options-month-week-days').show();
                $('#scheduling-options-month-days').hide();
            }
        } else {
            $('.scheduling-options-month').hide();
        }
    }

    var makeRows = function (dates) {
        var cells,
            cls,
            date,
            i,
            index = 1,
            part,
            parts,
            prevParts = [],
            prevStates = [],
            rows,
            states;
        rows = (function () {
            var j,
                len,
                results;
            results = [];
            for (j = 0, len = dates.length; j < len; j++) {
                date = dates[j];
                states = [];
                parts = date.toString().split(' ');
                cells = (function () {
                    var l,
                        len1,
                        results1;
                    results1 = [];
                    for (i = l = 0, len1 = parts.length; l < len1; i = ++l) {
                        part = parts[i];
                        if (part === prevParts[i]) {
                            states[i] = prevStates[i];
                        } else {
                            states[i] = !prevStates[i];
                        }
                        cls = states[i] ? 'a' : 'b';
                        results1.push("<td class='" + cls + "'>" + part + "</td>");
                    }
                    return results1;
                })();
                prevParts = parts;
                prevStates = states;
                results.push("<tr><td>" + (index++) + "</td>" + (cells.join('\n')) + "</tr>");
            }
            return results;
        })();
        return rows.join('\n\n');
    };
}(jQuery));