(($) => {
    const options = {
        onComplete: (v, e, f) => {
            // console.log('onComplete');
            f.addClass('valid')
        },
        onKeyPress: (v, e, f, options) => {
            if (!v) {
                return
            }
            //console.log('A key was pressed!:', v, ' event: ', e, 'currentField: ', currentField, ' options: ', options)
            //console.log('onKeyPress')
            f.removeClass('valid')
            f.addClass('glow-green')
            setTimeout(() => {
                f.removeClass('glow-green')
            }, 500)
        },
        // onChange: (v, e, f) => {
        //     console.log('onChange');
        // },
        onInvalid: (v, e, f, invalid, options) => {
            if (!v) {
                return
            }
            //var error = invalid[0]
            //console.log('Digit: ', error.v, ' is invalid for the position: ', error.p, '. We expect something like: ', error.e)
            //console.log('onInvalid')
            f.removeClass('valid')
            f.addClass('glow-red')
            setTimeout(() => {
                f.removeClass('glow-red')
            }, 500)
        }
    }

    $('.date-mask').mask('00/00/0000', {...options, placeholder: 'mm/dd/yyyy'}).keyup()
    $('.time-mask').mask('00:00:00', {...options, placeholder: 'hh:mm:ss'}).keyup()
    $('.datetime-mask').mask('00/00/0000 00:00:00', {...options, placeholder: 'mm/dd/yyyy hh:mm:ss'}).keyup()
    $('.cep-mask').mask('00000-000', {...options, placeholder: '_____-___'}).keyup()
    $('.zip-mask').mask('00000', {...options, placeholder: '_____'}).keyup()
    $('.phonebr-mask').mask('(00) 0000-0000', {...options, placeholder: '(__) ____-____'}).keyup()
    $('.phoneus-mask').mask('(000) 000-0000', {...options, placeholder: '(___) ___-____'}).keyup()
    $('.ip-mask').mask('099.099.099.099', {...options, placeholder: '___.___.___.___'}).keyup()
    $('.cnpj-mask').mask('00.000.000/0000-00', {...options, placeholder: '__.___.___/____-__', reverse: true}).keyup()
    $('.cpf-mask').mask('000.000.000-00', {...options, placeholder: '___.___.___-__', reverse: true}).keyup()
    $('.itin-mask').mask('000-00-0000', {...options, placeholder: '___-__-____', reverse: true}).keyup()
    $('.ssn-mask').mask('000-00-0000', {...options, placeholder: '___-__-____', reverse: true}).keyup()
    $('.money-mask').mask('#.##0,00', {...options, reverse: true}).keyup()
    $('.percent-mask').mask('##0,00%', {...options, reverse: true}).keyup()
})(jQuery)
