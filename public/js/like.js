const forms = document.querySelectorAll('#form-js');

forms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action');

        const token = document.querySelector('meta[name="csrf-token"]').content;

        const jobId = this.querySelector('#job-id-js').value;

        const count = this.querySelector('#count-js');

        const like = this.querySelector('#like');


        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'post', 
            body: JSON.stringify({
                id: jobId
            })

        }).then(response => {
            response.json().then(data => {
                count.innerHTML = data.count;
                like.innerHTML = data.like;
                // return response->json(['error'=>'Unauthorized', 'message'=>'vous devez etre connecté'], 401);
            })
        }).catch(error => {
            console.log(error)
            alert(error);
        });

    });
});


$('.count-js').click(function (e) { 

    $('.count-js').each(function () { 
        if ($(this).text() != 1) {
            console.log('il est a 1');
        }else{
            console.log("c'est pas 1");
        }
    });

});




$('.try').click(function () {

    var brand = [];
    $('.try').each(function () {
        if ($(this).is(":checked")) {
            brand.push($(this).val());
        }
    });
    finalbrand = brand.toString();
    // console.log(finalbrand);
    $.ajax({
        type: 'get',
        // dataType:'json',
        dataType: 'html',
        url: '',
        beforeSend: function () { 
            $('#loader').show();
        },
        complete: function () { 
            $('#loader').hide();
        },
        data: "brand=" + finalbrand,
        success: function (response) {
            console.log(response);
            // alert(response);
            $('#updateDiv').html(response);
        }
    });
});


$(document).ready(function () {
    $('.pay').click(function () {
        var money = $(this).val();
        console.log(money);

        pay = money.toString();
        $.ajax({
            type: 'get',
            // dataType:'json',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
             },
            complete: function () { 
                $('#loader').hide();
             },
            data: "salary=" + pay,
            success: function (response) {
                console.log(response);
                // alert(response);
                $('#updateDiv').html(response);
            }
        });    

    });
});
// payAll

$(document).ready(function () {
    $('.payAll').click(function () {
        var money = $(this).val();
        console.log(money);

        pay = money.toString();
        $.ajax({
            type: 'get',
            // dataType:'json',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "all_salary=" + pay,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    

    });
});

$(document).ready(function () {
    $('.daysCheck').click(function () {
        var days = $(this).val();
        // console.log(days);
        // alert(days);

        dayscheck = days.toString();
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "days=" + dayscheck,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    

    });
});

$(document).ready(function () {
    $('#searchbar').keyup(function () {
        var days = $(this).val();
        // console.log(days);
        console.log(days);
        dayscheck = days.toString();
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "title=" + dayscheck,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    
    });
});

$(document).ready(function () {
    $('#BtnSearch').click(function (e) {
        e.preventDefault();
        var text = $('#searchbar').val()
        var cat = $('#search-category').val();
        var loc = $('#id-location').val();
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "text=" + text + '&category=' +cat +'&location=' + loc,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    

    });
});
$(document).ready(function () {
    $('#search-category').change(function (e) { 
        var cato = $(this).val()
        console.log(cato);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "category=" + cato,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    
    });
});
$(document).ready(function () {
    $('#id-location').change(function (e) {
        var loc = $(this).val()
        console.log(loc);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "location=" + loc,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });    
    });
});



$(document).ready(function () {
    $('#homeFindBtn').click(function (e) {
        e.preventDefault();
        var homecity = $('#homecity').val()
        var hometext = $('#hometext').val();
        // var loc = $('#id-location').val();

        console.log(homecity);
        console.log(hometext);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "Hcity=" + homecity + '&Htitle=' +hometext,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
                // $('#homeresult').html(response);
            }
        });    

    });
});


$(document).ready(function () {
    $('#BtnSalary').click(function (e) {
        e.preventDefault();
        var maxSalary = $('#maxSalary').val()
        var minSalary = $('#minSalary').val();
        // var loc = $('#id-location').val();

        console.log(maxSalary);
        console.log(minSalary);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "minSalary=" + minSalary + '&maxSalary=' +maxSalary,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
                // $('#homeresult').html(response);
            }
        });    

    });
});

$(document).ready(function () {
    $('.filterCity').click(function (e) {
        // e.preventDefault();
        var city = $(this).val()
        console.log(city);

        // $('.try').each(function () {
        //     if ($(this).is(":checked")) {
        //         brand.push($(this).val());
        //     }
        // });
    
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '',
            beforeSend: function () { 
                $('#loader').show();
            },
            complete: function () { 
                $('#loader').hide();
            },    
            data: "filterCity=" + city,
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
                // $('#homeresult').html(response);
            }
        });    

    });
});






// $(document).ready(function () {

//     var count= document.getElementById('#count-js');
//     var like= document.getElementById('#like');

//         $('#vide').addClass('hidden');
//         $('#plein').addClass('hidden');

//         if ($('#count-js').text() == 1) {
//             console.log("c'est 1");
//             $('#plein').removeClass('hidden');
//                 // $('#vide').addClass('hidden');
//         } else {
//             $('#vide').removeClass('hidden');

//             console.log("c'est 0");
//         }

//     $('#like').click(function (e) { 

//         if ($('#count-js').text() == 1) {
//             console.log("c'est 1");
//             $('#plein').addClass('hidden');
//             $('#vide').removeClass('hidden');

//         } else {
//             console.log("c'est 0");
//             $('#plein').removeClass('hidden');
//             $('#vide').addClass('hidden');


//         }
//     });
// });

$(document).ready(function () {
    $('.optionsRadios1').click(function(e) {
        console.log('chek1');
        $('.optionsday1').prop("checked", true);
      });
});
$(document).ready(function () {
    $('.optionsRadios2').click(function(e) {
        console.log('chek2');
        $('.optionsday2').prop("checked", true);
      });
});
$(document).ready(function () {
    $('.optionsRadios3').click(function(e) {
        console.log('Check3');
        $('.optionsday3').prop("checked", true);
      });
});

