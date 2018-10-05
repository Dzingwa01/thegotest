@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="container" style="margin-top:3em;">
        <div id="normal_tracker" class="row">
            <div id="normal_tracker" class="step-container" style="width: 500px; margin: 0 auto"></div>
        </div>
     <div class="row">
         <h6 class="center">Please Select a Package below & acknowledge our contract with you. </h6>

             <div class="row" style="margin-top:2em;">
                 @foreach($packages as $package)
                 <div class="col s12 m4" >
                     <div class="card blue-grey darken-1">
                         <div class="card-content white-text" style="height: 200px;">
                             <span class="card-title">{{$package->package_name . " - R ". $package->package_price}}</span>
                             <p>{{$package->package_description}}</p>
                         </div>
                         <div class="card-action">
                             {{--<a  onclick="select_modal(this)" href="#">Select</a>--}}
                             <a id="{{$package->id}}" class="waves-effect waves-light btn modal-trigger" href="#terms_modal" onclick="select_package(this)">Select</a>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>

     </div>

    </div>
    <div id="terms_modal" class="modal">
        <div class="modal-content">
            <h4>The Go Terms and Conditions</h4>
           <h5>1. Introduction</h5>
            <p>THESE TERMS AND CONDITIONS ARE BINDING AND ENFORCEABLE AGAINST ALL PERSONS (USERS) THAT ACCESS THE GO WEBSITE OR ANY PART THEREOF (THE GO WEBSITE) IN TERMS OF SECTION 11 OF THE ELECTRONIC COMMUNICATIONS AND TRANSACTIONS (ECT) ACT 25 OF 2002.
                IF USERS DO NOT AGREE TO THESE TERMS AND CONDITIONS THEY MUST LEAVE THE GO WEBSITE NOW, AS ANY FURTHER USE WILL AUTOMATICALLY BIND THEM TO THESE TERMS AND CONDITIONS
            </p>
            <h5>2. DEFINITIONS & INTERPRETATIONS</h5>
            <p>
                2.1.	“THE GO” means the website or content and shall include any part thereof;<br/>
                2.2.	“User(s)”:  means any person who access THE GO website, notwithstanding the fact that such a person only visited the home page of the THEGO website;<br/>
                2.3.	You and the company or business that you are authorized to represent (“you,” “your,” or “Company”) agree to these The Go Terms of Service and all other applicable terms, policies, and documentation (collectively, “Business Terms”) by downloading or using The Go apps, software, features, services, and APIs designed and developed for businesses (“Business Services”).<br/>

            </p>
            <h5>3. GENERAL</h5>
            <p>
                3.1.	We provide our Business Services solely for your business or commercial use.<br/>
                3.2.	NO ACCESS TO EMERGENCY SERVICES. Please note important differences between our Business Services and mobile phone, fixed-line telephone, or SMS services. Our Business Services do not provide access to emergency services or emergency services providers, including the police, fire departments, or hospitals, or otherwise connect to public safety answering points. Company should ensure that it can contact its relevant emergency services providers through a mobile phone, fixed-line telephone, or other service.

            </p>
            <h5>4.	INTELLECTUAL PROPERTY RIGHTS AND DOMAIN NAME USE</h5>
            <p>
                4.1.	All intellectual property on THE GO website, including but not limited to content, design elements,
                software, databases, text, graphics, icons and hyperlinks are the property of THE GO and as such,
                are protected from infringement by domestic and international legislation and treaties. Subject to the rights licensed in clause 2, all other rights to intellectual property on the THE website are expressly reserved.
            </p>
            <h5>5. PRIVACY</h5>
            <p>
                5.1.	THE GO shall take all reasonable steps to protect the personal information of Users. For the purpose of this clause, “personal information” shall be defined as detailed in the Promotion of Access to Information Act 2 of 2000 (PAIA).<br/>
                5.2.	THE GO may electronically collect, store and use the following personal information of Your Employee Contacts.  -Company provides employee contact information such as phone numbers (“Employee Data”) to The Go, and Company determines which of its employees it may communicate with using The Go.<br/>
                5.3.	Information is collected either electronically by using cookies or is provided voluntarily by the User. Users may determine cookie use independently through their browser settings.

            </p>
            <h5>6.	HYPERLINKS TO THIRD PARTY SITES</h5>
            <p>
                6.1  THE GO may provide hyperlinks to web sites not controlled by THE GO (target sites) and such links do not imply any endorsement, agreement on or support for the content of such target sites. THE GO does not editorially control the content on such target sites and shall not be liable,
                in any manner whatsoever, for the access to, inability to access or content available on or through such target sites.
            </p>
            <h5>7 SECURITY</h5>
            <p>
                7.1  THE GO shall take all reasonable steps to secure the content of the THE GO website and the information provided by and collected from Users from unauthorised access and/or disclosure.
                However THE GO does not make any warranties or representations that content shall be 100% safe and secure.
            </p>
            <h5>8 THE GO ACCOUNT</h5>
            <p>8.1.	Business Use and Eligibility. You represent and warrant that you: (a) will use our Business Services
                solely for business, commercial, and authorized purposes, and for personal use; (b) will only provide
                registration information associated with your Company; (c) are authorized to enter into these Business Terms
                and are at least 13 years old (or the age of majority in your country of residence); and (d)
                have not been previously suspended or removed from our Services, or engaged in any activity that could result in suspension or removal;<br/><br/>
                10.2.	Registration and Account. Company must create a The Go account by providing accurate, current, and complete information,
                including its valid legal business phone number, Company name, and other information we require. Company will keep its business account information updated. Company’s name must not: (a) be false, misleading, deceptive, or defamatory; (b) parody a third party or include character symbols, excessive punctuation, or trademark designations; or (c) infringe any trademark, violate any right of publicity, or otherwise violate anyone’s rights. We reserve the right to reclaim account names on behalf of any business or individual that holds legal claim in those names.
            </p>
            <h5>9 AGREEMENT IN TERMS OF SECTION 21 OF THE ECT ACT</h5>
            <p>9.1.	the User shall be bound to these term and conditions and such agreement is concluded in Cape Town at the time the User enters the THE GO website for the first time or immediately after the User indicated consent as required during the “Sign me in” process;
                9.2.	data messages (as defined in the ECT Act) addressed by the User to THE GO shall only be deemed to have been received by THE GO if THE GO responds thereto;
                9.3.	data messages (as defined in the ECT Act) addressed to the User by THE GO shall be deemed to be received by the User as detailed in section 23(b) of the ECT Act.
                9.4.	data messages (as defined in the ECT Act) addressed by the User to THE GO shall be deemed to have been created and send by the User from within the geographical boundaries of South Africa;
                9.5.	electronic signatures, encryption and/or authentication is not required for valid electronic communications between the User and THE GO; and
                9.6.	the User agrees and warrants that data messages that are sent to THE GO from a computer, IP address or mobile device normally used by or owned by the User, was sent and/or authorised by the User personally.
            </p>
            <h5>10 Availability</h5>
            <p>
               10.1  Our Business Services may be interrupted, including for maintenance, repairs, upgrades, or network or equipment failures. We may discontinue some or all of our Business Services, including certain features and the support for certain devices and platforms, at any time.
                Events beyond our control may affect our Business Services, such as events in nature and other force majeure events.
            </p>
            <h5>11 APPLICABLE & GOVERNING LAW</h5>
            <p>
                11.1 THE GO website is hosted, controlled and operated from the Republic of South Africa and therefore the South African law enforced by the South African
                courts governs the use or inability to use THE GO website, its content, services and these terms and conditions.
            </p>
            <h5>12 LEGAL COSTS</h5>
            <p>
                12.1 THE GO shall not be liable for costs incurred by Users to obtain professional advice relating to these terms and conditions.
            </p>
            <h5>13 DISCLAIMER</h5>
            <p>
                COMPANY USES OUR BUSINESS SERVICES AT ITS OWN RISK AND SUBJECT TO THE FOLLOWING DISCLAIMERS. WE ARE
                PROVIDING OUR BUSINESS SERVICES ON AN “AS IS” BASIS WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES,
                INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NON-INFRINGEMENT,
                AND FREEDOM FROM COMPUTER VIRUS OR OTHER HARMFUL CODE. WE DO NOT WARRANT THAT ANY INFORMATION PROVIDED BY US IS ACCURATE, COMPLETE, OR USEFUL; THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL BE OPERATIONAL, ERROR FREE, SECURE, OR SAFE; OR THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL FUNCTION WITHOUT DISRUPTIONS, DELAYS, OR IMPERFECTIONS. WE DO NOT CONTROL, AND ARE NOT RESPONSIBLE FOR CONTROLLING, HOW OR WHEN OUR USERS USE OUR BUSINESS SERVICES OR OTHER SERVICES, OR THE
                FEATURES, FUNCTIONALITIES, AND INTERFACES OUR BUSINESS SERVICES OR OTHER SERVICES PROVIDE. WE ARE NOT RESPONSIBLE FOR AND ARE NOT OBLIGATED TO CONTROL THE ACTIONS OR INFORMATION (INCLUDING CONTENT) OF OUR USERS OR OTHER THIRD PARTIES.
            </p>
        </div>
        <div class="modal-footer" style="margin-bottom: 3em;">
            <a id="disagree_btn" style="text-decoration: none;" class="btn" href="#!" class="modal-close waves-effect waves-green btn-flat">Disagree</a>
            <a id="agree_btn" style="text-decoration: none;margin-left: 3em;margin-right: 3em;" class="btn" href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <style>

    </style>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="js/materialize.js"></script>
    <script>
        function select_package(obj){
            sessionStorage.setItem("package_id",obj.id);
        }
        $(document).ready(function(){
            $('.step-container').stepMaker({
                steps: ['Business Signup', 'Template Info', 'Packages&Contracts','Finish'],
                currentStep: 3
            });
            $('.modal').modal();
            $("#agree_btn").on('click',function(){
                $.get('/save_package/'+sessionStorage.getItem('package_id'),function(response){
                    console.log("data",response);
                    window.location.href = "/business-signup-finish";
                });

            });
        });

    </script>
@endsection


