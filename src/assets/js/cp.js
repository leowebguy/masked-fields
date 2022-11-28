(($) => {
    $('.date-mask').mask('00/00/0000', {placeholder: 'mm/dd/yyyy'})
    $('.time-mask').mask('00:00:00', {placeholder: 'hh:mm:ss'})
    $('.datetime-mask').mask('00/00/0000 00:00:00', {placeholder: 'mm/dd/yyyy hh:mm:ss'})
    $('.cep-mask').mask('00000-000', {placeholder: '_____-___'})
    $('.zip-mask').mask('00000', {placeholder: '_____'})
    $('.phonebr-mask').mask('(00) 0000-0000', {placeholder: '(__) ____-____'})
    $('.phoneus-mask').mask('(000) 000-0000', {placeholder: '(___) ___-____'})
    $('.ip-mask').mask('099.099.099.099', {placeholder: '___.___.___.___'})
    $('.cnpj-mask').mask('00.000.000/0000-00', {placeholder: '__.___.___/____-__', reverse: true})
    $('.cpf-mask').mask('000.000.000-00', {placeholder: '___.___.___-__', reverse: true})
    $('.itin-mask').mask('000-00-0000', {placeholder: '___-__-____', reverse: true})
    $('.money-mask').mask('#.##0,00', {reverse: true})
    $('.percent-mask').mask('##0,00%', {reverse: true})
})(jQuery)
