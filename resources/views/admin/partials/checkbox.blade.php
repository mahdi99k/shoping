<script>

    $(function () {

        $('#selectAll').click(function () {   // اگر رو این اینپوت کلیک شد بیا ...
            if ($(this).prop('checked')) {   // prop = بیا حالت فعال کردن دکمه اینپوت قرار بدهاگر کیک شد رو اینپوت غعال کردن همه
                $('.checkedAll').prop('checked', true);
                $('#disableAll').prop('checked', false);  // ائن یکی اینپوت غیرفعال کن حالت رنگ آبی
            }
        })

        $('#disableAll').click(function () {
            if ($(this).prop('checked')) {
                $('.checkedAll').prop('checked', false);
                $('#selectAll').prop('checked', false);
            }
        })

    })

</script>
