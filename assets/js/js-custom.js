
   $( document ).ready(function() {
      var nv_aryDayName = new Array('Chủ nhật','Thứ Hai','Thứ Ba','Thứ Tư','Thứ Năm','Thứ Sáu','Thứ Bảy');
      var nv_aryDayNS = new Array('CN','Hai','Ba','Tư','Năm','Sáu','Bảy');
      var nv_aryMonth = new Array('Tháng Một','Tháng Hai','Tháng Ba','Tháng Tư','Tháng Năm','Tháng Sáu','Tháng Bảy','Tháng Tám','Tháng Chín','Tháng Mười','Tháng Mười một','Tháng Mười hai');
      var nv_aryMS = new Array('Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12');
      var nv_formatString = "dd.mm.yyyy";
      var nv_gotoString = "Chọn tháng hiện tại";
      var nv_todayString = "Hôm nay";
      var nv_weekShortString = "Tuần";
      var nv_weekString = "Tuần";
      var nv_old_Minute = - 1;

      if( typeof( nv_my_dst ) == 'undefined' )
      {
         var nv_my_dst = false;
      }
      if( typeof( nv_my_ofs ) == 'undefined' )
      {
         var nv_my_ofs = 7;
      }
      if( typeof( nv_my_abbr ) == 'undefined' )
      {
         var nv_my_abbr = 'ICT';
      }
      function nv_DigitalClock(div_id)
      {
         if(nv_my_dst)
         {
            var test_dst = nv_is_dst();
            if(test_dst) nv_my_ofs += 1;
         }

         var newDate = new Date();
         var ofs = newDate.getTimezoneOffset() / 60;
         newDate.setHours(newDate.getHours() + ofs + nv_my_ofs);

         var intMinutes = newDate.getMinutes();
         var intSeconds = newDate.getSeconds();
         if(intMinutes != nv_old_Minute)
         {
            nv_old_Minute = intMinutes;
            var intDay = newDate.getDay();
            var intMonth = newDate.getMonth();
            var intWeekday = newDate.getDate();
            var intYear = newDate.getYear();
            var intHours = newDate.getHours();

            if (intYear < 200) intYear = intYear + 1900;
            var strDayName = new String(nv_aryDayName[intDay]);
            var strDayNameShort = new String(nv_aryDayNS[intDay]);
            var strMonthName = new String(nv_aryMonth[intMonth]);
            var strMonthNameShort = new String(nv_aryMS[intMonth]);
            var strMonthNumber = intMonth + 1;
            var strYear = new String(intYear);
            var strYearShort = strYear.substring(2, 4);

            if (intHours <= 9) intHours = '0' + intHours;
            if (intMinutes  <= 9) intMinutes  = '0' + intMinutes;
            // if (intSeconds <= 9) intSeconds = '0' + intSeconds;
            if (intWeekday <= 9) intWeekday = '0' + intWeekday;
            if (strMonthNumber <= 9) strMonthNumber = '0' + strMonthNumber;

            var strClock = '';
            // strClock = intHours + ':' + intMinutes + ':' + intSeconds + ' ' + GMT
            // + '   ' + strDayName + ', ' + intWeekday + '/' + strMonthNumber
            // + '/' + intYear;
            strClock = strDayName + ', ' + intWeekday + '/' + strMonthNumber + '/' + intYear;
            var spnClock = document.getElementById(div_id);
            spnClock.innerHTML = strClock;
         }
         setTimeout('nv_DigitalClock("'+div_id+'")', (60 - intSeconds) * 1000);
      }
      nv_DigitalClock('digclock');

      $( document ).ready( function()
      {
         $( '.buzz' ).each( function()
         {
            $( this ).attr( 'data-buzz' , $( this ).text() );
         } );
      } );
   });

