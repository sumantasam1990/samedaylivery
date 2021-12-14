@include('layouts.header', ['title' => $title])

<div class="container home mt-4">
    <div class="row">

        <div class="col-md-10 mx-auto">
            <div class="text-center mt-4">
                <h1 class="display-5 fw-bolder">Offer your customers guaranteed 4-hour delivery and same-day delivery in up to 300 metro areas even on weekends and all holidays.</h1>
                <p class="fw-bold mt-3 fs-6 text-center subheading">Consumers absolutely love and value same day delivery and delivery in hours. Stay ahead of your competition and grow your customer base.</p>
                <a class="btn btn-info btn-lg mt-4" href="{{ route('subscribe') }}">Sign Up Today</a>
                <p class="mt-3">Week-to- Week. No long term commitment.</p>
            </div>
        </div>

    </div>
</div>

{{--<div class="container text-center mt-4 container-home">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <img src="{{ asset('images/clipboard.webp') }}" style="width: 80px; ">--}}
{{--            <h4 class="fw-bold mt-4 fs-2">Comprehensive</h4>--}}
{{--            <p class="mt-3">--}}
{{--                Your buyers can create a detailed set of criteria for unlimited aspects of each house and rate it on a detailed scale of how much they like each aspect (+1 to +3) or how much they do not like each aspect (-1 to -3). This not only enables the buyers to see a clear an objective outline of which house is the best but also allows agents to show more properties based on this detailed feedback. Finally, it allows agents to sit down and advice which property is the best choice for their clients based on the data that has been compiled.            </p>--}}
{{--        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            <img src="{{ asset('images/scoreboard.webp') }}" style="width: 100px; margin-top: 38px; ">--}}
{{--            <h4 class="fw-bold mt-4 fs-2">Scoreboard</h4>--}}
{{--            <p class="mt-3">--}}
{{--                This is the most important feature. Scoreboard allows you to get a clear overview of how your buyers scored each property and how many times they used each score. This is a super valuable tool because it helps both the agents and their buyers see strongly they loved or not liked a particular property. This ultimately helps you and your buyer come to the best possible decisions of which property to pick and buy. Best of all each buyer can add their own Score to each property and have their own Scoreboard. So you can help your buyers compare and contrast.        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="container ">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 text-center p-5">--}}
{{--            <h1 class="display-3 fw-bold mb-4">--}}
{{--                Invite Other Agents--}}
{{--            </h1>--}}
{{--            <p class="">--}}
{{--                Invite every Agent that you know to sign up for Scorng because your Agent contacts may have a Seller who has a house that meets the criteria that your Buyers have scored as "Really Love It". This tremendously helps you, the Buyer's Agent, because your Buyers will find a house they love, that much faster.--}}
{{--            </p>--}}
{{--            <p>--}}
{{--                Also, as the Buyer Agent, inviting every Agent you know, will save you time because you don't have to spend time looking through tons of listings and not knowing whether your Buyers will love the house. By inviting Seller Agents, they will look through the Properties that you and your Buyers have added to your Score Pages and the Criteria and Scores. They'll contact you if they have a Seller whose house matches the criteria. It tremendously helps the Seller Agent for the same reason because they will find a Buyer for their Seller much faster.--}}
{{--            </p>--}}
{{--            <p>--}}
{{--                If you are a Seller Agent, invite Buyer Agents so they can have their Buyers add Scores to Properties so that you as a Seller Agent can discover if you have a Property that meets any Criteria that those Buyers have scored as "Really Love It".--}}
{{--            </p>--}}
{{--            <a class="btn btn-dark btn-lg mt-4" href="/signup">Sign Up Today</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="container-fluid cta-sky container-home mt-6">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h4 class="fw-bold display-5">How we can offer same-day and 4-hour delivery.</h4>
                <p>We rent out secure, indoor and climate-controlled storage units in 300 metro areas, combine products from dozens of retailers and manufacturers in each unit and bulk deliver products to customers in each metro area.</p>
{{--                <a style="color: #0CABA8;" class="btn btn-light btn-lg fw-bold mt-4" href="">The Benefits For Buyer's Agents</a>--}}
{{--                <a style="color: #0CABA8;" class="btn btn-light btn-lg fw-bold mt-4" href="">How It Works For Buyer's Agents</a>--}}
            </div>
        </div>
    </div>
</div>


<div class="container mt-6 ">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="fw-bold display-4">Two Simple Price</h4>
            <p>Week-to-Week. No long term commitment. </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-1"></div>
        <div class="col-md-5 mb-3">
            <div class="box-black text-center">
                <h2 class="fw-bold p-4">Same-day
                    GUARANTEED delivery</h2>
                <h4 class="display-4 fw-bold">$250/wk</h4>
                <p class="fw-bold">Per Metro</p>
                <div class="m-0">
                    <p class="m-2 fw-bold fs-6 mb-4">Delivered between 5pm-10pm. 7 days a week including all holidays.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Choose how many metro areas you would like.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">7 days a week delivery, including holidays.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Unlimited products delivered per month.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">$1,000 insurance per unit of product.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Send unlimited inventory per metro per month.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Inventory received email alerts.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Order delivered to customer email alerts.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Interviewed, verified and background checked delivery drivers and associates.</p>
                </div>
                <a class="btn btn-dark mt-4" href="{{ route('subscribe') }}">Sign Up</a>
            </div>
        </div>

        <div class="col-md-5 mb-3">
            <div class="box-black text-center">
                <h2 class="fw-bold text-center p-4">4-hour GUARANTEED delivery</h2>
                <h4 class="display-4 fw-bold">$500/wk</h4>
                <p class="fw-bold">Per Metro</p>
                <div class="m-0">
                    <p class="m-2 fw-bold fs-6 mb-4">Delivered in 4 hours after order is sent by the business. 7 days a week including all holidays.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Choose how many metro areas you would like.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">7 days a week delivery, including holidays.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Unlimited products delivered per month.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">$1,000 insurance per unit of product.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Send unlimited inventory per metro per month.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Inventory received email alerts.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Order delivered to customer email alerts.</p>
                    <p class="m-2 fw-bold fs-6 mb-4">Interviewed, verified and background checked delivery drivers and associates.</p>
                </div>

                <a class="btn btn-dark mt-4" href="{{ route('subscribe') }}">Sign Up</a>

            </div>

        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="container-fluid cta-red mt-6 container-home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h4 class="fw-bold display-5">Mark up the delivery service so there is no cost to your business.</h4>
                <p>Polls and statistics overwhelmingly show that consumers are more than happy to pay extra for delivery in hours or same day delivery. This way, not only will your business make it's money back but you may even make a profit depending on how many units of products are ordered by your customer in each metro area.</p>
{{--                <a style="color: #008AFC;" class="btn btn-light btn-lg fw-bold mt-4" href="">The Benefits For Listing Agents</a>--}}
{{--                <a style="color: #008AFC;" class="btn btn-light btn-lg fw-bold mt-4" href="">How It Works For Listing Agents</a>--}}
            </div>
        </div>
    </div>
</div>


{{--<div class="container text-center mt-6 container-home">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <img src="{{ asset('images/chat.webp') }}" style="width: 80px; ">--}}
{{--            <h4 class="fw-bold mt-4">Threaded Message Rooms</h4>--}}
{{--            <p class="mt-3">--}}
{{--                Discuss each property, Criteria and Scores in detail with your buyers. Each Score Page will have unlimited Message Rooms. You and your buyers will receive an email notification of every new posted message.        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            <img src="{{ asset('images/infinity (1).webp') }}" style="width: 100px; margin-top: 30px; ">--}}
{{--            <h4 class="fw-bold mt-4">Limitless Details</h4>--}}
{{--            <p class="mt-4">--}}
{{--                Add as many super detailed criteria as possible so that the final score gives you and your clients the most detailed assessment of each property.        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="container-fluid cta-violet mt-6 container-home">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 text-center">--}}
{{--                <h4 class="fw-bold display-5">Objective Overview</h4>--}}
{{--                <p class="fw-bold mt-3 text-center subheading">Sit down with your clients and be able to clearly and easily help them pick the house they should buy, based on the transparent, objective and detailed feedback on each Score Page and Scoreboard.</p>--}}
{{--                <a style="color: #370143;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign up</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="container text-center mt-4 container-home">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 mt-4">--}}
{{--            <img src="{{ asset('images/team.webp') }}" style="width: 80px; ">--}}
{{--            <h4 class="fw-bold mt-4">Invite Clients</h4>--}}
{{--            <p class="mt-3">--}}
{{--                Simply invite your Buyers and allow them to start adding properties or scoring properties that you have already added.--}}
{{--        </div>--}}
{{--        <div class="col-md-6 mt-md-2 mt-4">--}}
{{--            <img src="{{ asset('images/star (1).webp') }}" style="width: 80px; ">--}}
{{--            <h4 class="fw-bold mt-4">Relevant Properties</h4>--}}
{{--            <p class="mt-3">--}}
{{--                With the Score Page and Scoreboard, you can see how your clients scored which criteria. This presents super valuable information for you because now you can find more properties that possess the same criteria that your clients loved.--}}
{{--        </div>--}}
{{--        <div class="col-md-6 mt-4">--}}
{{--            <img src="{{ asset('images/medal.webp') }}" style="width: 80px; ">--}}
{{--            <h4 class="fw-bold mt-4">Finalists Page</h4>--}}
{{--            <p class="mt-3">--}}
{{--                Buyers and Agents can add properties that "make the cut" to the Finalist Page.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 mt-4">--}}
{{--            <img src="{{ asset('images/dashboard.webp') }}" style="width: 80px; margin-top: 20px; ">--}}
{{--            <h4 class="fw-bold mt-4"> Dashboard</h4>--}}
{{--            <p class="mt-3">--}}
{{--                Agents can clearly see all of their Buyers on one single page. Simply click on their name and access their Score Page and everything associated with it.--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



{{--<div class="container-fluid cta-red-deep mt-6 container-home">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 text-center">--}}
{{--                <h4 class="fw-bold display-5">Every Buyer's Scores</h4>--}}
{{--                <p>Scorng allows Agents to see every Buyer's Scores for each criteria of every property. This way you can see which aspects of each property that each Buyer <br> likes and strategically sell the house to them based on those Scores.</p>--}}
{{--                <a style="color: #FE2301;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign Up Today</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="container-fluid mt-6 container-home ">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h4 class="fw-bold display-5">Benefits For Your Business</h4>
                <p>Start with the metro area where the highest number of your customers are located in and then add more as you get more comfortable with Same Daylivery. Strategically advertise on social media and with influencers in metro areas that you add on Same Daylivery.</p>
                <a style="color: #FE2301;" class="btn btn-dark btn-lg fw-bold mt-4" href="{{ route('benefits') }}">The Benefits</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-6 container-home metro-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h4 class="fw-bold display-5 text-white">Ease on in with a metro area at a time. Add as many as you need.</h4>
                <p>Learn about the numerous benefits that Same Daylivery can provide your business and your customers.</p>
{{--                <a style="color: #FE2301;" class="btn btn-dark btn-lg fw-bold mt-4" href="">The Benefits</a>--}}
            </div>
        </div>
    </div>
</div>







<div>
    @include('layouts.footer')
</div>

