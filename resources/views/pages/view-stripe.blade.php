@extends('pages.layouts.user')
@section('content')
    <link rel="shortcut icon" href="https://d1wqzb5bdbcre6.cloudfront.net/0a52c32d718bfbfb2fddc8da23296b4436d08932619f7a2738adf35f8c09d5d7/68747470733a2f2f66696c65732e7374726970652e636f6d2f66696c65732f4d44423859574e6a64463878534559775a317044536c4978626d7470597a4a5866475a666447567a6446394263456c304f453952576e5a7652454a555330566f4d47564d62464e34546b38303063713345486f6c71">
    <link href="https://js.stripe.com/v3/fingerprinted/css/checkout-53eb466b2cc992665f879c7ed21262b7.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://js.stripe.com/v3/fingerprinted/css/checkout-app-init-4d2726e4191cde3078052c31dddb0b03.css">
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/checkout-app-init-0f3f04398496f384293e0bac73223ce8.js"></script>
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/sentry-browser-04afb47be1a7a4455613c354edf4d2cf.js"></script>
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/icon-8abb29ca7bb265754d83e27422a3924d.js"></script>
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/rtg-b9638ed37bc5ead57bd9b149128d2a66.js"></script>
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/brand-icon-468e56d79c24857106fe745639008c45.js"></script>
    <script charset="utf-8" src="https://js.stripe.com/v3/fingerprinted/js/trusted-types-checker-9b6e874f149cc545c2c2335f8707fd1f.js"></script>

    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">
            // this identifies your website in the createToken call below
            Stripe.setPublishableKey('pk_test_51J9TNvH0xwvdbtTMxvN8e5gyQWuOd6ez786OVlwCgsYXLxIILrmy39rF0TprUVIBQRGgVNZ6T6jVRCa2XcyE929Z00EnjyRFfa');

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var $form = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    $form.get(0).submit();
                }
            }

            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    exp_date = $('.card-expiry-date').val().split("/")
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");
                    var chargeAmount = 1000; //amount you want to charge, in cents. 1000 = $10.00, 2000 = $20.00 ...
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: exp_date[0],
                        exp_year: exp_date[1]
                    }, chargeAmount, stripeResponseHandler);
                    return false; // submit from callback
                });
            });
        </script>

    <div class="App-Payment" style="margin: 7rem 0;">
        <div class="CheckoutPaymentForm">
            <div class="PaymentRequestOrHeader" style="height: 124px;">
                <div class="PaymentHeaderContainer d-flex justify-content-center">

                    <div class="PaymentHeader">
    @if($general)
                        <img src="{{asset($general->logo_footer)}}" width="200" alt="">
    @endif
                    </div>
                </div>
                {{-- <div class="ButtonAndDividerContainer" style="display: block; opacity: 1;">
                    <div role="button" class="FakeWalletButton FakeWalletButton--applePay"><svg class="InlineSVG Icon" focusable="false" width="70" height="50" viewBox="0 0 60 40" version="1.1">
                            <path d="M 15.355469 12.96875 C 14.816406 13.609375 13.949219 14.113281 13.085938 14.039062 C 12.976562 13.175781 13.398438 12.253906 13.894531 11.6875 C 14.4375 11.03125 15.382812 10.5625 16.148438 10.523438 C 16.238281 11.425781 15.886719 12.308594 15.355469 12.96875 M 16.140625 14.210938 C 14.886719 14.140625 13.816406 14.925781 13.21875 14.925781 C 12.617188 14.925781 11.703125 14.25 10.714844 14.265625 C 9.425781 14.285156 8.226562 15.015625 7.566406 16.175781 C 6.214844 18.503906 7.214844 21.949219 8.523438 23.839844 C 9.164062 24.777344 9.929688 25.804688 10.9375 25.769531 C 11.894531 25.734375 12.273438 25.148438 13.425781 25.148438 C 14.589844 25.148438 14.921875 25.769531 15.933594 25.75 C 16.980469 25.734375 17.636719 24.8125 18.277344 23.875 C 19.007812 22.8125 19.304688 21.777344 19.324219 21.722656 C 19.304688 21.703125 17.304688 20.9375 17.285156 18.628906 C 17.265625 16.699219 18.863281 15.78125 18.933594 15.726562 C 18.035156 14.390625 16.628906 14.25 16.140625 14.210938 M 23.378906 11.597656 L 23.378906 25.652344 L 25.5625 25.652344 L 25.5625 20.847656 L 28.582031 20.847656 C 31.339844 20.847656 33.277344 18.953125 33.277344 16.214844 C 33.277344 13.472656 31.375 11.597656 28.652344 11.597656 Z M 25.5625 13.4375 L 28.078125 13.4375 C 29.96875 13.4375 31.050781 14.445312 31.050781 16.222656 C 31.050781 18 29.96875 19.015625 28.066406 19.015625 L 25.5625 19.015625 Z M 37.265625 25.761719 C 38.632812 25.761719 39.90625 25.066406 40.480469 23.96875 L 40.527344 23.96875 L 40.527344 25.652344 L 42.546875 25.652344 L 42.546875 18.65625 C 42.546875 16.628906 40.925781 15.320312 38.425781 15.320312 C 36.109375 15.320312 34.398438 16.644531 34.332031 18.46875 L 36.300781 18.46875 C 36.460938 17.601562 37.265625 17.035156 38.363281 17.035156 C 39.699219 17.035156 40.445312 17.65625 40.445312 18.800781 L 40.445312 19.578125 L 37.722656 19.738281 C 35.191406 19.890625 33.820312 20.929688 33.820312 22.730469 C 33.820312 24.554688 35.234375 25.761719 37.265625 25.761719 Z M 37.851562 24.09375 C 36.6875 24.09375 35.949219 23.535156 35.949219 22.675781 C 35.949219 21.792969 36.660156 21.28125 38.019531 21.199219 L 40.445312 21.046875 L 40.445312 21.839844 C 40.445312 23.15625 39.328125 24.09375 37.851562 24.09375 Z M 45.242188 29.476562 C 47.371094 29.476562 48.371094 28.664062 49.246094 26.203125 L 53.078125 15.457031 L 50.859375 15.457031 L 48.289062 23.757812 L 48.246094 23.757812 L 45.675781 15.457031 L 43.394531 15.457031 L 47.089844 25.6875 L 46.890625 26.3125 C 46.558594 27.367188 46.019531 27.769531 45.054688 27.769531 C 44.882812 27.769531 44.546875 27.753906 44.414062 27.734375 L 44.414062 29.421875 C 44.539062 29.457031 45.082031 29.476562 45.242188 29.476562 Z M 45.242188 29.476562 " style="stroke: none; fill-rule: nonzero; fill: rgb(255, 255, 255); fill-opacity: 1;"></path>
                        </svg></div>
                    <div class="Divider">
                        <hr>
                        <p class="Divider-Text Text Text-color--gray400 Text-fontSize--14 Text-fontWeight--400">Or pay with card</p>
                    </div>
                </div> --}}
            </div>
            <form  action="{{route('make-payment',$order->id)}}" method="POST" id="payment-form">
    @csrf
                {{-- <div class="App-Global-Fields flex-container spacing-16 direction-row wrap-wrap">
                    <div class="flex-item width-12">
                        <div class="FormFieldGroup">
                            <div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="email"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Email</span></label>
                                <div style="opacity: 1; transform: none;"></div>
                            </div>
                            <div class="FormFieldGroup-Fieldset" id="email-fieldset">
                                <div class="FormFieldGroup-container">
                                    <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                        <div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput Input Input--empty" autocomplete="email" autocorrect="off" spellcheck="false" id="email" name="email" type="text" inputmode="email" autocapitalize="none" aria-invalid="false" aria-describedby="" value=""></span></div>
                                    </div>
                                    <div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span aria-hidden="true"></span></span></div>
                                </div>
                                <div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span aria-hidden="true"></span></span></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="PaymentForm-paymentMethodFormContainer flex-container spacing-16 direction-row wrap-wrap">
                    <div class="flex-item width-12">
                        <div class="FormFieldGroup">
                            <div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="cardNumber-fieldset"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Card information</span></label></div>
                            <fieldset class="FormFieldGroup-Fieldset" id="cardNumber-fieldset">
                                <div class="FormFieldGroup-container" id="cardNumber-fieldset">
                                    <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop">
                                        <div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty card-number" autocomplete="cc-number" autocorrect="off" spellcheck="false" id="cardNumber" name="cardNumber" type="text" inputmode="numeric" aria-label="Card number" placeholder="1234 1234 1234 1234" aria-invalid="false" value=""></span>
                                            <div class="FormFieldInput-Icons" style="opacity: 1;">
                                                <div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/visa-365725566f9578a9589553aa9296d178.svg" alt="visa" class="BrandIcon"></span></div>
                                                <div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="mastercard" class="BrandIcon"></span></div>
                                                <div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="amex" class="BrandIcon"></span></div>
                                                <div class="CardFormFieldGroupIconOverflow"><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/discover-ac52cd46f89fa40a29a0bfb954e33173.svg" alt="discover" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/jcb-271fd06e6e7a2c52692ffa91a95fb64f.svg" alt="jcb" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--visible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/diners-fbcbd3360f8e3f629cdaa80e93abdb8b.svg" alt="diners" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/unionpay-8a10aefc7295216c338ba4e1224627a1.svg" alt="unionpay" class="BrandIcon"></span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childLeft FormFieldGroup-childBottom">
                                        <div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty card-expiry-date" autocomplete="cc-exp" autocorrect="off" spellcheck="false" id="cardExpiry" name="cardExpiry" type="text" inputmode="numeric" aria-label="Expiration" placeholder="MM / YY" aria-invalid="false" value=""></span></div>
                                    </div>
                                    <div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childRight FormFieldGroup-childBottom">
                                        <div class="FormFieldInput has-icon"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty card-cvc" autocomplete="cc-csc" autocorrect="off" spellcheck="false" id="cardCvc" name="cardCvc" type="text" inputmode="numeric" aria-label="CVC" placeholder="CVC" aria-invalid="false" value=""></span>
                                            <div class="FormFieldInput-Icon is-loaded"><svg class="Icon Icon--md" focusable="false" viewBox="0 0 32 21">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <g class="Icon-fill">
                                                            <g transform="translate(0 2)">
                                                                <path d="M21.68 0H2c-.92 0-2 1.06-2 2v15c0 .94 1.08 2 2 2h25c.92 0 2-1.06 2-2V9.47a5.98 5.98 0 0 1-3 1.45V11c0 .66-.36 1-1 1H3c-.64 0-1-.34-1-1v-1c0-.66.36-1 1-1h17.53a5.98 5.98 0 0 1 1.15-9z" opacity=".2"></path>
                                                                <path d="M19.34 3H0v3h19.08a6.04 6.04 0 0 1 .26-3z" opacity=".3"></path>
                                                            </g>
                                                            <g transform="translate(18)">
                                                                <path d="M7 14A7 7 0 1 1 7 0a7 7 0 0 1 0 14zM4.22 4.1h-.79l-1.93.98v1l1.53-.8V9.9h1.2V4.1zm2.3.8c.57 0 .97.32.97.78 0 .5-.47.85-1.15.85h-.3v.85h.36c.72 0 1.21.36 1.21.88 0 .5-.48.84-1.16.84-.5 0-1-.16-1.52-.47v1c.56.24 1.12.37 1.67.37 1.31 0 2.21-.67 2.21-1.64 0-.68-.42-1.23-1.12-1.45.6-.2.99-.73.99-1.33C8.68 4.64 7.85 4 6.65 4a4 4 0 0 0-1.57.34v.98c.48-.27.97-.42 1.44-.42zm4.32 2.18c.73 0 1.24.43 1.24.99 0 .59-.51 1-1.24 1-.44 0-.9-.14-1.37-.43v1.03c.49.22.99.33 1.48.33.26 0 .5-.04.73-.1.52-.85.82-1.83.82-2.88l-.02-.42a2.3 2.3 0 0 0-1.23-.32c-.18 0-.37.01-.57.04v-1.3h1.44a5.62 5.62 0 0 0-.46-.92H9.64v3.15c.4-.1.8-.17 1.2-.17z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span aria-hidden="true"></span></span></div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="billing-container flex-item width-12" aria-hidden="false">
                        <div style="pointer-events: auto; height: auto; opacity: 1;">
                            <div class="flex-container spacing-16 direction-row wrap-wrap">
                                <div class="flex-item width-12">
                                    <div class="FormFieldGroup">
                                        <div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="billingName"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Name on card</span></label></div>
                                        <div class="FormFieldGroup-Fieldset">
                                            <div class="FormFieldGroup-container" id="billingName-fieldset">
                                                <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                                    <div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput Input Input--empty" autocomplete="ccname" autocorrect="off" spellcheck="false" id="billingName" name="billingName" type="text" aria-invalid="false" value=""></span></div>
                                                </div>
                                                <div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span aria-hidden="true"></span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-item width-12"></div>
                    <div class="flex-item width-12"><button class="SubmitButton SubmitButton--incomplete" type="submit" style="background-color: rgba(24,30,139,1); color: #fff;">
                            <div class="SubmitButton-Shimmer" style="background: linear-gradient(to right, rgba(52, 49, 69, 0) 0%, rgb(72, 69, 90) 50%, rgba(52, 49, 69, 0) 100%);"></div>
                            <div class="SubmitButton-TextContainer"><span class="SubmitButton-Text SubmitButton-Text--current Text Text-color--default Text-fontWeight--500 Text--truncate" aria-hidden="false">£{{number_format($order->total,2)}}</span><span class="SubmitButton-Text SubmitButton-Text--pre Text Text-color--default Text-fontWeight--500 Text--truncate" aria-hidden="true">Processing...</span></div>
                            <div class="SubmitButton-IconContainer">
                                <div class="SubmitButton-Icon SubmitButton-Icon--pre">
                                    <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" focusable="false">
                                            <path d="M3 7V5a5 5 0 1 1 10 0v2h.5a1 1 0 0 1 1 1v6a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1zm5 2.5a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1zM11 7V5a3 3 0 1 0-6 0v2z" fill="#ffffff" fill-rule="evenodd"></path>
                                        </svg></div>
                                </div>
                                <div class="SubmitButton-Icon SubmitButton-SpinnerIcon SubmitButton-Icon--pre">
                                    <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false">
                                            <ellipse cx="12" cy="12" rx="10" ry="10" style="stroke: rgb(255, 255, 255);"></ellipse>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="SubmitButton-CheckmarkIcon">
                                <div class="Icon Icon--md"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" focusable="false">
                                        <path d="M 0.5 6 L 8 13.5 L 21.5 0" fill="transparent" stroke-width="2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></div>
                            </div>
                        </button>
                        <div class="ConfirmPayment-PostSubmit">
                            <div></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="App-Footer">
        <div class="Footer-PoweredBy"><a class="Link Link--primary" target="_blank" rel="noopener"><span class="Text Text-color--gray400 Text-fontSize--12 Text-fontWeight--400">Powered by <svg class="InlineSVG Icon Footer-PoweredBy-Icon Icon--md" focusable="false" width="33" height="15">
                        <g fill-rule="evenodd">
                            <path d="M32.956 7.925c0-2.313-1.12-4.138-3.261-4.138-2.15 0-3.451 1.825-3.451 4.12 0 2.719 1.535 4.092 3.74 4.092 1.075 0 1.888-.244 2.502-.587V9.605c-.614.307-1.319.497-2.213.497-.876 0-1.653-.307-1.753-1.373h4.418c0-.118.018-.588.018-.804zm-4.463-.859c0-1.02.624-1.445 1.193-1.445.55 0 1.138.424 1.138 1.445h-2.33zM22.756 3.787c-.885 0-1.454.415-1.77.704l-.118-.56H18.88v10.535l2.259-.48.009-2.556c.325.235.804.57 1.6.57 1.616 0 3.089-1.302 3.089-4.166-.01-2.62-1.5-4.047-3.08-4.047zm-.542 6.225c-.533 0-.85-.19-1.066-.425l-.009-3.352c.235-.262.56-.443 1.075-.443.822 0 1.391.922 1.391 2.105 0 1.211-.56 2.115-1.39 2.115zM18.04 2.766V.932l-2.268.479v1.843zM15.772 3.94h2.268v7.905h-2.268zM13.342 4.609l-.144-.669h-1.952v7.906h2.259V6.488c.533-.696 1.436-.57 1.716-.47V3.94c-.289-.108-1.346-.307-1.879.669zM8.825 1.98l-2.205.47-.009 7.236c0 1.337 1.003 2.322 2.34 2.322.741 0 1.283-.135 1.581-.298V9.876c-.289.117-1.716.533-1.716-.804V5.865h1.716V3.94H8.816l.009-1.96zM2.718 6.235c0-.352.289-.488.767-.488.687 0 1.554.208 2.241.578V4.202a5.958 5.958 0 0 0-2.24-.415c-1.835 0-3.054.957-3.054 2.557 0 2.493 3.433 2.096 3.433 3.17 0 .416-.361.552-.867.552-.75 0-1.708-.307-2.467-.723v2.15c.84.362 1.69.515 2.467.515 1.879 0 3.17-.93 3.17-2.548-.008-2.692-3.45-2.213-3.45-3.225z"></path>
                        </g>
                    </svg></span></a></div>
        <div class="Footer-Links"><a class="Link Link--primary" target="_blank" rel="noopener"><span class="Text Text-color--gray400 Text-fontSize--12 Text-fontWeight--400">Terms</span></a><a class="Link Link--primary" target="_blank" rel="noopener"><span class="Text Text-color--gray400 Text-fontSize--12 Text-fontWeight--400">Privacy</span></a></div>
    </div> --}}
    <script src="https://js.stripe.com/v3/fingerprinted/js/checkout-loading-cabb90555ef8cb8235486d9be6026565.js"></script>
    <script id="stripe-js" src="https://js.stripe.com/v3/fingerprinted/js/stripe-ddf3e4b72faca3dcf956722a007bfa72.js" async=""></script>
    <script src="https://js.stripe.com/v3/fingerprinted/js/checkout-39b0ff64d03a8d0300f55a28a7b829c1.js" async=""></script><iframe name="__privateStripeMetricsController3170" frameborder="0" allowtransparency="true" scrolling="no" allow="payment *" src="https://js.stripe.com/v3/m-outer-5564a2ae650989ada0dc7f7250ae34e9.html#url=https%3A%2F%2Fcheckout.stripe.com%2Fpay%2Fcs_test_b1yFXGLCz4P7xIZeJ0LqN7phWAIQOMJytj499JWitjOsiax3AAzYfMLIPS%3FdemoWallet%3DapplePay%26demoPolicies%3Dfalse%23fidkdWxOYHwnPyd1blpxYHZxWjA0TUM1Yl9GT1c0a25sZjdSa2ppakZgQzdxVz1qYk9pcUBnNTc9Z11kVnc9b0F%252FREgxfE5oQ31Dd2dGME9sQVx2Tm1wc3RyRGhPZjIwTzRLYmd3TnJDSjJMNTVJMUBtbWNMQycpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPydocGlxbFpscWBoJyknYGtkZ2lgVWlkZmBtamlhYHd2Jz9xd3BgeCUl&amp;title=Stripe%20Checkout&amp;referrer=https%3A%2F%2Fcheckout.stripe.dev%2F&amp;muid=NA&amp;sid=NA&amp;version=6&amp;preview=true" aria-hidden="true" tabindex="-1" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; visibility: hidden !important; position: fixed !important; height: 1px !important; pointer-events: none !important; user-select: none !important;"></iframe><iframe name="__privateStripeController3171" frameborder="0" allowtransparency="true" scrolling="no" allow="payment *" src="https://js.stripe.com/v3/controller-722ee2426b68564522b9aa86d40134ea.html#apiKey=pk_test_51HF0gZCJR1nkic2WnoloCeF2tR8ogJltEb028bXaSr8jDzAM4yKmFxFrbC5JiDYsKhuvqwAmJc75J1NgbrKwFO7I00L4EhhfIF&amp;stripeJsId=0413d238-9fad-4370-a147-99454de52762&amp;outerFlags[cl]=false&amp;outerFlags[clc]=false&amp;betas[0]=google_pay_beta_1&amp;stripeJsLoadTime=1627239023209&amp;referrer=https%3A%2F%2Fcheckout.stripe.com%2Fpay%2Fcs_test_b1yFXGLCz4P7xIZeJ0LqN7phWAIQOMJytj499JWitjOsiax3AAzYfMLIPS%3FdemoWallet%3DapplePay%26demoPolicies%3Dfalse%23fidkdWxOYHwnPyd1blpxYHZxWjA0TUM1Yl9GT1c0a25sZjdSa2ppakZgQzdxVz1qYk9pcUBnNTc9Z11kVnc9b0F%252FREgxfE5oQ31Dd2dGME9sQVx2Tm1wc3RyRGhPZjIwTzRLYmd3TnJDSjJMNTVJMUBtbWNMQycpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPydocGlxbFpscWBoJyknYGtkZ2lgVWlkZmBtamlhYHd2Jz9xd3BgeCUl&amp;controllerId=__privateStripeController3171" aria-hidden="true" tabindex="-1" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; visibility: hidden !important; position: fixed !important; height: 1px !important; pointer-events: none !important; user-select: none !important;"></iframe><iframe name="__privateStripeFrame3176" frameborder="0" allowtransparency="true" scrolling="no" allow="payment *" sandbox="allow-scripts allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin" referrerpolicy="origin" src="https://js.stripe.com/v3/payment-request-inner-google-pay-50f1b4acbf632689fc989b8b1844265b.html#authentication[apiKey]=pk_test_51HF0gZCJR1nkic2WnoloCeF2tR8ogJltEb028bXaSr8jDzAM4yKmFxFrbC5JiDYsKhuvqwAmJc75J1NgbrKwFO7I00L4EhhfIF&amp;mids[guid]=NA&amp;mids[muid]=NA&amp;mids[sid]=NA&amp;origin=https%3A%2F%2Fcheckout.stripe.com&amp;referrer=https%3A%2F%2Fcheckout.stripe.com%2Fpay%2Fcs_test_b1yFXGLCz4P7xIZeJ0LqN7phWAIQOMJytj499JWitjOsiax3AAzYfMLIPS%3FdemoWallet%3DapplePay%26demoPolicies%3Dfalse%23fidkdWxOYHwnPyd1blpxYHZxWjA0TUM1Yl9GT1c0a25sZjdSa2ppakZgQzdxVz1qYk9pcUBnNTc9Z11kVnc9b0F%252FREgxfE5oQ31Dd2dGME9sQVx2Tm1wc3RyRGhPZjIwTzRLYmd3TnJDSjJMNTVJMUBtbWNMQycpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPydocGlxbFpscWBoJyknYGtkZ2lgVWlkZmBtamlhYHd2Jz9xd3BgeCUl&amp;controllerId=__privateStripeController3171" aria-hidden="true" tabindex="-1" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; visibility: hidden !important; position: fixed !important; height: 1px !important; pointer-events: none !important; user-select: none !important;"></iframe>
    <div style="position: absolute; z-index: 1000; top: 98.21px; left: 182px;"></div>
    <div class="Modal-Portal"></div>
    <div class="Modal-Portal"></div>
    <div class="Modal-Portal"></div>
@endsection


{{-- @extends('layouts.home')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Stripe Getting Started Form</title>
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">
            // this identifies your website in the createToken call below
            Stripe.setPublishableKey('pk_test_51J9TNvH0xwvdbtTMxvN8e5gyQWuOd6ez786OVlwCgsYXLxIILrmy39rF0TprUVIBQRGgVNZ6T6jVRCa2XcyE929Z00EnjyRFfa');

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var $form = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    $form.get(0).submit();
                }
            }

            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");
                    var chargeAmount = 1000; //amount you want to charge, in cents. 1000 = $10.00, 2000 = $20.00 ...
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, chargeAmount, stripeResponseHandler);
                    return false; // submit from callback
                });
            });
        </script>
    </head>
    <body>
        <style>
            .content{
                background:#556CD6;
                margin-bottom:2%;
                color:#fff;
            }
            label{
                display:block;
            }
        </style>
        <div class="container p-4 content d-flex flex-column justify-content-center" style="width:30%;margin-top:5%;border-radius:10px;">
        <h1 class=" my-2 text-center" style="justify-self: start; font-weight:bold; font-size:30px">Checkout by Stripe</h1>
        <!-- to display errors returned by createToken -->
        <span class="payment-errors"></span>
        <form class="container mx-auto d-flex flex-column justify-content-around "  action="{{route('make-payment')}}" method="POST" id="payment-form">
<div class="my-3 form-row mx-auto d-flex justify-content-md-around" style="width:80%;">
    <label class="d-block">Card Number</label>
    <input type="text" size="20" autocomplete="off" class="card-number" />
</div>
<div class="my-3 form-row mx-auto d-flex justify-content-around" style="width:85%;">
    <label>CVC</label>
    <input type="text" size="20" autocomplete="off" style="margin-left:9%" />
</div>
<div class=" my-3 form-row mx-auto d-flex justify-content-around" style="width:80%;">
    <label>Expiration (MM/YYYY)</label>
    <div>
        <input type="text" size="2" class="card-expiry-month" />
        <span> / </span>
        <input type="text" size="4" class="card-expiry-year" />
    </div>

</div>
<button class="my-3 mx-auto btn btn-dark" type="submit">Submit Payment</button>
</form>
</div>
</body>
</html>

@endsection --}}
