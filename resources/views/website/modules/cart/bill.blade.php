<style>
  *, *:before, *:after {box-sizing: border-box;}

/* STANDARD ELEMENTS */
body {
  background: #fff;
  color: #2e3031;
  font: 100%/1.5 "Clan OT", "HelveticaNeue", "Helvetica", "Arial", sans-serif;
  -webkit-text-size-adjust: 100%;
  min-height: 100vh;
  /* Force Outlook to provide a "view in browser" button. */
  width: 100% !important;
  max-width: 950px;
  margin: 0 auto;
}
p {
  margin-top: 0;
}
img {
  outline: none;
  text-decoration: none;
  display: block;
}
br,
strong br,
b br,
em br,
i br {
  line-height: 100%;
}
/* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
table td,
table tr {
  border-collapse: collapse;
}
table {
  table-layout: fixed;
}
/* Body text color for the New Yahoo.  This example sets the font of Yahoo's Shortcuts to black. */
/* This most probably won't work in all email clients. Don't include code blocks in email. */
code {
  white-space: normal;
  word-break: break-all;
}

/* CUSTOM CLASSES */
.email-body {
  padding: 10px 10px 0;
  background-color: #ffffff;
  border-collapse: collapse;
  border: 0;
  padding: 0;
}

.header--marketing {
  border-bottom: 8px solid #ffcf00;
}

.email-content {
  padding: 0 24px 24px;
}
.h2, h2 {
  font-size: 24px;
  font-weight: bold;
  margin: .5em 0;
}

.tablesaw {
  width: 100%;
  max-width: 100%;
  empty-cells: show;
  border-collapse: collapse;
  border: 0;
  padding: 0;
}

.tablesaw-stack td .tablesaw-cell-label,
.tablesaw-stack th .tablesaw-cell-label {
  display: none;
}

.icon {
  display: inline-block;
  margin-left: 4px;
}

/*#Unsubscribe-Message {color: #767673; white-space: normal; padding-top: 20px;font-size: 11px;}*/
#Unsubscribe-Message {
  text-decoration: underline !important;
  cursor: pointer;
  padding-left: 50px !important;
  color: #4d95f5;
}


.footer {
  padding: 12px 24px;
  background: #b4d3e3;
  color: #fff;
  line-height: 1.2;
}
.footer__legal {
  font-size: 12px;
  line-height: 16px;
  color: #767673;
  white-space: normal;
}
.footer__legal {
  margin: 0;
}
/*footer logo section NOT image*/
.footer-logo {
  // padding: 10px 0 0 50px;
}
/*footer logo image NOT section*/
.logo {
  margin: 0 0 10px;
  max-width: 120px;
  transition: max-width 0.2s ease;
}
/**
 * vCard - address and telephone pattern
 */
.vcard {
  display: inline-block;
  margin-right: 12px;
}
.vcard__link {
  color: #767673;

  &:hover {
    color: #ffffff;
  }
}
.vcard__adr {
  font-size: 12px;
}
.vcard__adr > * {
  margin-bottom: 4px;
}
.vcard__tel {
  font-size: 12px;
  color: #767673;
}
.adr__region {
  border-bottom: none;
}
.adr__country-name {
  visibility: hidden;
  height: 0;
}



/* Mobile first styles: Begin with the stacked presentation at narrow widths */
/* Support note IE9+: @media only all */
@media only all {
  /* Show the table cells as a block level element */

  .tablesaw-stack {
    clear: both;
    border-collapse: collapse;
  }
  
  .tablesaw-stack tbody tr {
    // display: block;
    width: 100%;
    border-bottom: 1px solid #dfdfdf;
  }

  .tablesaw-stack td,
  .tablesaw-stack th {
    text-align: left;
    display: block;
    font-size: 14px;
  }

  .tablesaw-stack th {
    border-bottom: 1px solid #dfdfdf;
    padding: 0;
    border-collapse: separate;
    border-spacing: 10px;
  }
  
  .tablesaw-stack tr {
    clear: both;
    display: table-row;
  }

  .tablesaw-stack tr:first-child td {
    padding-top: 8px;
  }

  /* Make the label elements a percentage width */

  .tablesaw-stack td .tablesaw-cell-label,
  .tablesaw-stack th .tablesaw-cell-label {
    display: inline-block;
    padding: 0 0.6em 0 0;
    width: 30%;
  }

  /* For grouped headers, have a different style to visually separate the levels by classing the first label in each col group */

  .tablesaw-stack th .tablesaw-cell-label-top,
  .tablesaw-stack td .tablesaw-cell-label-top {
    display: block;
    padding: 0.4em 0;
    margin: 0.4em 0;
  }

  .tablesaw-cell-label {
    display: block;
  }
  
  .tablesaw-cell-content {
    display: inline-block;
    max-width: 100%;
  }
  /* Avoid double strokes when stacked */

  .tablesaw-stack tbody th.group {
    margin-top: -1px;
  }

  /* Avoid double strokes when stacked */

  .tablesaw-stack th.group b.tablesaw-cell-label {
    display: none !important;
  }
}

/* SMALL SCREENS UP TO 660px */
@media only screen and (max-width: 41.25em) {

}

@media (max-width: 39.9375em) {
  /* Table rows have a gray bottom stroke by default */

  .tablesaw-stack tbody tr {
    display: block;
    width: 100%;
  }

  .tablesaw-stack thead td,
  .tablesaw-stack thead th {
    display: none;
  }

  .tablesaw-stack tbody td,
  .tablesaw-stack tbody th {
    display: block;
    float: left;
    clear: left;
    width: 100%;
  }

  .tablesaw-cell-label {
    vertical-align: top;
  }

  .tablesaw-cell-content {
    display: inline-block;
    /*max-width: 67%;*/
  }

  .tablesaw-stack .tablesaw-stack-block .tablesaw-cell-label,
  .tablesaw-stack .tablesaw-stack-block .tablesaw-cell-content {
    display: block;
    width: 100%;
    max-width: 100%;
    padding: 0;
  }

  .tablesaw-stack td:empty,
  .tablesaw-stack th:empty {
    display: none;
  }
}

/* Media query to show as a standard table at 560px (35em x 16px) or wider */
@media (min-width: 40em) {
  .tablesaw-stack tr {
    display: table-row;
  }

  /* Show the table header rows */

  .tablesaw-stack td,
  .tablesaw-stack th,
  .tablesaw-stack thead td,
  .tablesaw-stack thead th {
    display: table-cell;
    margin: 0;
    padding: 4px 8px;
    font-size: 16px;
  }

  /* Hide the labels in each cell */

  .tablesaw-stack td .tablesaw-cell-label,
  .tablesaw-stack th .tablesaw-cell-label {
    display: none !important;
  }
}

@media (max-width: 39.9375em) {
  /* Table Label for document name */
  #Doc_name {
    display: block !important;
  }
}

@media (min-width: 40em) {
  #Doc_name {
    display: none !important;
  }
}

@media all and (min-width: 52em) {
  h2,
  .h2 {
    font-size: 36px;
  }
  .footer {
    padding: 24px 48px;
  }
}




/* Email Client-specific Styles */
#outlook a {
  padding: 0;
}

/*what are the following for?*/
.article-content,
#left-sidebar {
  -webkit-text-size-adjust: 90% !important;
  -ms-text-size-adjust: 90% !important;
}
.ReadMsgBody {
  width: 100%;
}
.ExternalClass {
  width: 100%;
  display: block !important;
}
#permission-reminder {
  white-space: normal;
}

</style>
<!-- table for entire email -->
<table align="center" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-body">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF">
        <!-- another table for entire email? -->
        <table>
          <tbody>
            <!-- email-header -->
            <tr>
              <td class="header--marketing">
                <div align="left" style="text-align: left">
                  <a href="http://www.primeclerk.com"><img id="customHeaderImage" label="Header Image" editable="true" src="{{ asset('website/assets/img/logo/PHONE STORE_free-file (3).png') }}" border="0" align="top" style="display: inline"></a>
                </div>
              </td>
            </tr>
<!--             email-body -->
            <tr id="simple-content-row">
              <td bgcolor="#ffffff">
                <!-- email body content -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tbody>
                    <tr>
                      <td class="email-content">
                        <div align="left">
                          <h2>Hello,{{Auth::user()->fullname}}</h2>
                          <p>Cảm mơn quý khác đã đặt hàng tại Store Phone.</p>
                          <!-- <p>Đơn hàng được thanh toán vào lúc </p> -->
                          <!-- ? -->
                          <table class="tablesaw-stack tbl-striped tbl-results">
                            <thead>
                              <tr>
                                <th data-column="0" class="" tabindex="0" unselectable="on" style="user-select: none;">
                                  <div>Tên sản phẩm</div>
                                </th>
                                <th data-column="1" class="" tabindex="0" unselectable="on" style="user-select: none;">
                                  <div class="tablesorter-header-inner">Số lượng</div>
                                </th>
                                <th data-column="2" class="" tabindex="0" unselectable="on" style="user-select: none;">
                                  <div class="">Giá tiền</div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                  @foreach($cart as $item)
                                  <tr>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->qty}}</td>
                                      <td>{{number_format($item->price* $item->qty)}} VND</td>
                                  </tr>
                                  @endforeach

                              </tbody>
                              <tfoot>
                                            <tr>
                                                <th>Giá chưa thuế</th>
                                                <td> <strong>{{Cart::count()}}</strong></td>
                                            
                                                <td> <strong>{{Cart::subTotal()}} VND</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Thuế</th>
                                                <td></td>
                                                <td><strong>5%</strong></td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Giá sau thuế</th>
                                                <td></td>
                                                <td><strong>{{Cart::total()}} VND</strong></td>
                                            </tr>
                                        </tfoot>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
<!--             email-footer -->
            <tr>
              <td align="left">
<!--                 email-footer-content -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" class="footer">
                  <tbody>
                    <tr>
                      <td>
                        <div class="footer-alpha">
                          <div class="company-info">
                          <div class="footer-logo">
                          <a href="http://www.primeclerk.com"><img class="logo" alt="Prime Clerk" width="100" height="20" src="{{ asset('website/assets/img/logo/PHONE STORE_free-file (3).png') }}">
                          </a>
                        </div>
                          <div>
                            <div class="vcard">
                              <a class="vcard__link" href="">
                                    <address class="vcard__adr">
                                        <div class="adr__street-address">50 Quang Trung,Gò Vấp</div>
                                        <span class="adr__locality">TPHCM</span>,
                                        <span class="adr__locality-name">Vietnam</span>
                                    </address>
                                </a>
                            </div>
                            
                            
                          </div>
                        </div>
                        </div>
                        
                        <div class="footer-bravo footer__legal">
                          <p align="left" class="" style="color: #767673;">© @php echo date("Y") @endphp Store Phone . All rights reserved.</p> <a href="mailto:daothanhphuc@gmail.com">Gmail:Storephone</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>