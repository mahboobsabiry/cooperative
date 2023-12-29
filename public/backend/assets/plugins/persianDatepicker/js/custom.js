$(function() {
    $("#pdFromDate").persianDatepicker({
        months: ["حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "میزان", "عقرب", "قوس", "جدی", "دلو", "حوت"],
        dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
        shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
        showGregorianDate: !1,
        persianNumbers: !0,
        formatDate: "YYYY/MM/DD",
        selectedBefore: !1,
        selectedDate: null,
        startDate: null,
        endDate: null,
        prevArrow: '\u25c4',
        nextArrow: '\u25ba',
        theme: 'default',
        alwaysShow: !1,
        selectableYears: null,
        selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        cellWidth: 40, // by px
        cellHeight: 30, // by px
        fontSize: 13, // by px
        isRTL: !1,
        calendarPosition: {
            x: 0,
            y: 0,
        },
        onShow: function () { },
        onHide: function () { },
        onSelect: function () { },
        onRender: function () { }
    });

    $("#pdToDate").persianDatepicker({
        months: ["حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "میزان", "عقرب", "قوس", "جدی", "دلو", "حوت"],
        dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
        shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
        showGregorianDate: !1,
        persianNumbers: !0,
        formatDate: "YYYY/MM/DD",
        selectedBefore: !1,
        selectedDate: null,
        startDate: null,
        endDate: null,
        prevArrow: '\u25c4',
        nextArrow: '\u25ba',
        theme: 'default',
        alwaysShow: !1,
        selectableYears: null,
        selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        cellWidth: 40, // by px
        cellHeight: 30, // by px
        fontSize: 13, // by px
        isRTL: !1,
        calendarPosition: {
            x: 0,
            y: 0,
        },
        onShow: function () { },
        onHide: function () { },
        onSelect: function () { },
        onRender: function () { }
    });
});
