$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json'
    }
})

$(document).on('submit', '.send-requset', event => {
    event.preventDefault()
    const $form = $(event.currentTarget)
    const data = new FormData($form[0])
    $('.text-danger').remove()
    $('.text-success').remove()
    let ext = data.get('file').name.split('.');
    ext = ext[ext.length - 1]
    data.append('ext', ext)

    $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: data,
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        success: res => {
            if (res.status == 'error') {
                $('.send-requset button[type=submit]').after(`<span class="text-danger">${res.message}</span>`)
            } else {
                $('.send-requset button[type=submit]').after(`<span class="text-success">${res.message}</span>`)
            }
        },
        error: res => {
            console.log(res)
            const errors = res.responseJSON.errors
            for (const value in res.responseJSON.errors) {
                $('#' + value)
                    .css({
                        'border': '1px solid red'
                    })
                    .after(`<span class="text-danger">${errors[value][0]}</span>`)
                console.log(errors[value])
            }
        }
    })
})
