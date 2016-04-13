@extends('layouts.app')

@section('content')

<?php 

//echo '<pre>';print_r($faq);
?>
<div class="container" id="faqs">
    <div class="row">
        <h3>FAQs</h3>
        <p>We are very excited to be working with your properties team as we bring the Tech Amenity initiative to your residents. We understand that there are a lot of aspects to this project, and want to prepare you to create a seamless transition for you and your residents. In this On-Boarding Website, you will find some frequently asked questions, property pricing and comparisons, and enrollment tracking.</p>
        <p>We value the management team, and recognize that you play an integral role in policy implementation and effectiveness.  Because of this, we are putting incentives in place for your team to reach the goals.  The goal for your property is a 70% enrollment rate by a date to be determined. If your team reaches that goal you will receive a monetary reward.</p>
        <p>To create excitement in your community, we are offering several initiatives for your residents to sign up early and amend their current leases prior to the launch. We will give you a concrete date closer to the launch.  Once enrolled, residents will receive the first month of service for free. Additionally, we will be holding a raffle with impressive prizes; if they sign up before the determined date they will be automatically entered to win.  Prizes will either be delivered by the leasing staff or in a “town meeting”.  If you have any ideas for raffle prizes that would do well in your community, please feel free to reach out to us.</p>
        <p>We are here to support you 100% of the way. If you are feeling overwhelmed or your residents have any questions that you are unable to answer, please feel free to direct them to the Tech Amenity Support line- 1-888-784-6867. Kelly and Dane are happy to assist in any way they can.</p>
        <h4 class="faq-title">Ditaro Website</h4> 
        <p>The Ditaro website is to be used as an onboarding tool. We have created a dashboard with the rent roll uploaded to it. On there you will be able to access resident information, track notes and see your progress! There is a place for you to mark whether or not they have signed the addendum, charges being added and the dollar amount of the charge. Please keep this updated as it is what we will use to track your properties progress.</p>
        <h4 class="faq-title">Property Manager FAQ</h4>
        <div class="col-md-12 panel-group" id="accordion" role="tablist" aria-multiselctable="true">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="true" aria-controls="collapseSixteen">
                            Pricing Comparisons
                        </a>
                    </h4>
                </div>
                <div id="collapseSixteen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>We are thrilled to be bringing this value to your property and your residents. Currently, the average cost for cable and internet in your area is $105. Because we have developed a relationship with Charter Spectrum, we are able to provide the same service for $70. That is a monthly savings of $40! Take that over a year lease and your residents will save (on average) $480 a year in cable and internet cost for the basic package.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            Process/ Timeline
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>On behalf of Charter, there will be contractors entering each apartment to install the necessary equipment. As soon as we know the installation timeline, residents will be notified of when work will be done on their building. Ideally, Charters equipment will be installed in the living room, however depending on the location of the electrical it may be installed in a bedroom or a closet. Charter may move residents personal belongings if they are in the way.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Creating the Cable Charge
                        </a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>When residents sign the addendum, please update Yardi at the same time. You will create a future charge (CBL) for $70.00. Please update the website when the addendum has been signed and the charge has been added. Create the charge for the date 30 days after the apartments service is live. For example- If the installation / go live date is 03/15/2016 create the charge in Yardi to start 04/15/2016. (You will receive a project timeline so you will know buildings go live dates)</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            Do new move in and referrals go on the resident dashboard?
                        </a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>Yes! Add in move ins/renewals. Make sure they sign the updated addendum and they know the charge will start on the date your property goes live. To add new residents upload a new rent-roll. The rent-roll used is the “Resident email and phone directory”.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            What if the resident has Charter internet only and doesn’t want to upgrade?
                        </a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>Previous services will no longer be available when Charter installs the new upgrades. However, if a resident is going to wait until the renewal to transition to the Tech Amenity, but have Charter internet or TV only, we will match the current price of their existing service. At renewal, the Tech Amenity will be added to their lease. Please make sure to include this information when updating the residents profile in the resident dashboard.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                            What if the resident is in contract with another company?
                        </a>
                    </h4>
                </div>
                <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>Previous services will no longer be available when Charter installs the new upgrades. However, if a resident is going to wait until the renewal to transition to the tech amenity, but have Charter internet or TV only, we will match the current price of their existing service. At renewal, the tech amenity will be added to their lease.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                            What if the resident is in contract with another company?
                        </a>
                    </h4>
                </div>
                <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>If a resident is in contract with another company we will do our best to buy out the contract. The resident will need to provide a copy of their bill and the buyout guidelines. We will set up a time to call with the resident to set up the cancellation. We then mail out a check to the resident for the contracted amount.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                            How will residents who don’t currently have a cable box receive one?
                        </a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>They will go to the nearest Charter distribution center and pick up a digital cable box, or they can call the Charter technical support and arrange to have one shipped to their apartment.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                            How will residents receive their passcodes for the Wi-Fi?
                        </a>
                    </h4>
                </div>
                <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>As the buildings go live, Charter will distribute a welcome packet to the leasing office. It will have the Passphrase, username and password for each unit. We recommend keeping a copy in the office for future reference.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                            What if my resident forgets or loses their password?
                        </a>
                    </h4>
                </div>
                <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>No worries! Charter has created a web portal for property managers to reset and create passwords for residents. Once you have verified the resident and where they live, log onto the portal (training to come) and pull up their apartment and have the resident choose what they want for a password. The portal will also be used for all new move ins.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                            How do we ensure the residents who haven’t signed the Tech Amenity addendum don’t have access?
                        </a>
                    </h4>
                </div>
                <div id="collapseThirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>For the managed Wi-Fi, Charter will create the initial profiles for the site and generate authentication credentials for each resident. The Property Manager will give the credentials to the residents once it goes live. Residents who have not signed the addendum will have access to the guest network, however the bandwidth is much slower.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                            Is On-Demand included with the Charter Select?
                        </a>
                    </h4>
                </div>
                <div id="collapseFourteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>Yes! Residents will have access to On-Demand services. If they choose to purchase or rent movies they will be billed directly by Charter.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen">
                            Is there a direct internet connection? IE not wireless
                        </a>
                    </h4>
                </div>
                <div id="collapseFifteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>Yes! We are providing an Ethernet port in each apartment so residents can directly connect to the internet. The Ethernet port will ideally be installed in the living room for easy access.</p>
                    </div>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen" aria-expanded="true" aria-controls="collapseSeventeen">
                            An objection that we foresee is residents asking “Why is it mandatory?” “What if I don’t want internet?”
                        </a>
                    </h4>
                </div>
                <div id="collapseSeventeen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p> Internet is quickly becoming a basic utility.  The Cottonwood Portfolio is not the only company launching this initiative. Many large apartment groups are starting to require residents pay for high-speed internet along with their rent at a much higher rate, trending $95-$110. This is our way of staying ahead of the curve to make sure we are providing this utility at an affordable price, as well as securing a high-speed service. This benefits the resident, as it keeps them at a lower cost, and they don’t have to do any of the legwork.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
