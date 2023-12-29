$('#jdFromDate').jdatepicker({
    date: moment(),
    format:'jYYYY/jM/jD',
    lang:'fa',// 'fa' for Persian
    theme:'default',
    events: ['click'],// trigger event(s)
    container:'body',
    prevMonthText:'قبل',
    nextMonthText:'بعد',
    dayNames: ['ش','ی','د','س','چ','پ','ج'],
    monthNames: ['حمل','ثور','جوزا','سرطان','اسد','سنبله','میزان','عقرب','قوس','جدی','دلو','حوت'],
    yearRange: [parseInt(_today.format('jYYYY')) - 100, parseInt(_today.format('jYYYY')) + 20],
    placement:'bottom',// 'top', 'right', 'left'
    weekend: [6],
    theme: {},
    target:null,
    targetFormat:'YYYY-MM-DD hh:mm:ss',
    minWidth:'260px',
    fullWidth:false,
    footer:true,
    today:true,
    year:true,
    month:true,
    dayOfWeek: (d) => {
        if (d > 5) {
            d = d - 5;
        }else {
            d = d + 2;
        }
        d = d - 1;
        return d;
    },
});

$('#jdToDate').jdatepicker({
    date: moment(),
    format:'jYYYY/jM/jD',
    lang:'fa',// 'fa' for Persian
    theme:'default',
    events: ['click'],// trigger event(s)
    container:'body',
    prevMonthText:'قبل',
    nextMonthText:'بعد',
    dayNames: ['ش','ی','د','س','چ','پ','ج'],
    monthNames: ['حمل','ثور','جوزا','سرطان','اسد','سنبله','میزان','عقرب','قوس','جدی','دلو','حوت'],
    yearRange: [parseInt(_today.format('jYYYY')) - 100, parseInt(_today.format('jYYYY')) + 20],
    placement:'bottom',// 'top', 'right', 'left'
    weekend: [6],
    theme: {},
    target:null,
    targetFormat:'YYYY-MM-DD hh:mm:ss',
    minWidth:'260px',
    fullWidth:false,
    footer:true,
    today:true,
    year:true,
    month:true,
    dayOfWeek: (d) => {
        if (d > 5) {
            d = d - 5;
        }else {
            d = d + 2;
        }
        d = d - 1;
        return d;
    },
});
