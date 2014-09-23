<?php $site = Theme::get('site'); ?>
<div class="main-container">
    <div class="main wrapper clearfix">
        <header>
            <div id="introtext">
                <span class="head-sarah">{{ $site->option('bride_name', 'Sarah') }}</span>
                <span class="head-brad">&nbsp;
                    <span class="amp">&amp;</span> 
                    {{ $site->option('groom_name', 'BRADLEY') }}
                </span>
                <div class="date">{{ $site->option('wedding_date', 'SEPTEMBER 6th, 2014') }}</div>
            </div>
        </header>

        <div class="clearfix"></div>
        <section id="brideandgroom" class="clearfix">
            <h1>The Bride and Groom</h1>
            <div class="column left">
                <h2>{{ $site->option('bride_name', 'Sarah') }}</h2>
                <p>
                    <img src="img/sarahThumb.jpg" class="thumb" alt="Sarah" />
                   {{ $site->option('bride_message', 'Sarah is most thankful to her parents for the gift of two loving big brothers &amp; five amazing role-model sisters. As the second-youngest, Sarah spent her childhood twirling &amp; dancing around, putting on talent shows for her parents &amp; grandparents. Her creative spirit and eye for design was established at a young age, as she highly disapproved of Mattel’s © furnishings and décor within her Barbie House. If Barbie needed an interior makeover (which was frequent) Sarah looked through Sunday newspaper ads &amp; IKEA magazines for inspiration, drew the new contents by hand and placed them as backdrops in the Barbie house. After graduation from Mater Dei High School, Sarah explored the metropolitan life in San Francisco and graduated with a BS in Interior Design from San Francisco State University. Sarah is adding to her vows that she will forever allow a one-room “man-den” with it\'ss contents and décor subject to Bradley\'s discretion.') }}</p>
            </div><!--end column-->
            <div class="column right">
                <h2>{{ $site->option('groom_name', 'BRADLEY') }}</h2>
                <p>
                    <img src="img/bradThumb.jpg" class="thumb" alt="Brad" />
                    {{ $site->option('groom_message', 'Born in Mission Viejo, California, Bradley spent half of his life living with his mother in San Diego and half with his wonderful Wisconsin family. Bradley grew up playing ice hockey while secretly learning how to build computers. Half jock, half nerd, he has cultivated these interests well into his adult life, that make him who he is today. After his graduation from the University of San Francisco with a degree in Information Systems, Bradley worked for Yahoo! for seven years, and continued to explore the tech startup scene in  San Francisco. With an entrepreneurial spirit and passion for technology, Bradley now runs his own software company, Scal.io, building hand-crafted mobile,  web, and desktop apps for tech companies in the Silicon Valley and beyond. Bradley is adding to his vows a lifetime IT guarantee to Sarah, that he will be readily available 24/7 to troubleshoot... anything &amp; everything technical.') }}</p>
            </div><!--end column-->

            <div class="clearfix"></div>
            <div class="column full">
                <div class="hr-t"></div>
                <div class="hr-b"></div>
            </div>

            <div class="column full">
                <h2>{{ $site->option('how_we_met_title', 'HOW WE MET') }}</h2>
                <p>{{ $site->option('how_we_met', 'In 2010 the two were both wild and running free around San Francisco\'s Marina District, as most singles do. Bradley was quite the bachelor- planning weekend getaways with friends, float trips, and taking last minute trips to Ibiza, Cabo, wherever the wind blew. Sarah was quite the bachelorette, wining and dining around San Francisco, on a strict agenda which included over-extending herself, saying yes to every social engagement that came her way.  After a mutual friend of the two suggested they would make a cute couple, a date was on the books and they began to discover just how compatible they were. In no time, they also discovered they were inseparable and very in love. The rest is history- they\'ve shared some amazing adventures around the world, each other\'s toothbrushes, and now they\re ready to share the rest of their lives together, too.') }}</p>
            </div><!--end column-->

            <div class="column full">
                <figure class="responsive-image proposal" data-media="img/onknee-small.jpg" data-media480="img/onknee-small.jpg" data-media768="img/onknee-medium.jpg" data-media1140="img/onknee-large.jpg" title="Brad Proposing To Sarah">
                    <noscript>
                    <img src="img/onknee-large.jpg" alt="Brad Proposing To Sarah" />
                    </noscript>
                </figure>

                <h2>{{ $site->option('the_engagement_title', 'THE ENGAGEMENT') }}</h2>
                <p>Down in San Diego for a weekend to visit Bradley’s mom, the pair decided to spend the beautiful morning at Balboa Park. After returning to their hotel, Bradley asked Sarah to run up to their room for a bottle of wine that had been chilling. Bradley said he was going to ask concierge for a “wine opener” and that he’d meet her in the courtyard. As Sarah opened the door to the room, she “freaked out”, thinking she was in the wrong room. It was decorated with bouquets of her favorite flowers, decadent treats and champagne. Rose petals on the floor led her to the open balcony, and as she walked out she saw Bradley waiting for her down below, with a huge grin on his face. And like out of a fairy tale, Romeo asked Juliet to be his wife. She giggled, and said yes. Bradley had it all captured by a hidden, sniper-style photographer.</p>

            </div><!--end column-->

        </section>

        <section id="wedding" class="clearfix">

            <h1>Wedding</h1>

            <div class="column left">
                <h2>CEREMONY</h2>
                <p>
                    The Inn at Rancho Santa Fe <br />
                    Rancho Santa Fe, California <br /><br />
                    Friday, September 6, 2013 <br />
                    6:00 PM at the Croquet Lawn <br /><br />
                    *Adult reception to follow <br /><br /><br />

                    <img src="img/theinn-large.png" class="theinn" alt="The Inn at Rancho Santa Fe" />
                </p>



            </div><!--end column--> 
            <div class="column right">
                <h2>SCHEDULE OF EVENTS</h2>
                <p>
                    Rehearsal Dinner <br />
                    Thursday, September 5th at 8pm<br /><br />
                    Golf <br />
                    Friday, September 6th at 9am<br /><br />
                    Ceremony <br />
                    Friday, September 6th at 6pm (reception to follow)<br /><br />
                    Breakfast &amp; Bocce <br />
                    Saturday, September 7th at 10am<br />
                </p>
            </div><!--end column--> 

            <div class="clearfix"></div>      
        </section>

        <section id="accomodations" class="clearfix">
            <h1>Accomodations</h1>
            <div class="column left">
                <h2>HOTELS</h2>
                <p>
                    (At the venue) <br />
                    The Inn at Rancho Santa Fe <br />
                    5951 Linea Del Cielo <br />
                    Rancho Santa Fe, CA 92067 <br />
                    <a href="tel:1-858-756-1131">(858) 756-1131</a> <br />
                    $279 <br /> 
                </p>
            </div><!--end column-->

            <div class="column right">
                <h2>DIRECTIONS</h2>
                <p>
                    Northbound from San Diego <br /><br />

                    Take Interstate 5 North to the Villa de La Valle exit #36.  Turn right (east) onto Via de La Valle, and proceed for 4 miles. After crossing La Gracia, turn left on Via de Santa Fe following the signs to Rancho Santa Fe.  At the first stop sign, turn left onto Paseo Delicias and drive 2 blocks to a five way stop.  Take a slight right onto Linea del Cielo and proceed for one block.  The Inn is located on the left side of the road at 5951 Linea del Cielo.
                    <br /><br />

                    Southbound from LA, Riverside &amp; OC<br /><br />

                    Take Interstate 5 South to the Lomas Santa Fe exit #37.  Turn left (east) onto Lomas Santa Fe, and proceed 4.5 miles.  The road name will change to Linea Del Cielo.  The Inn is located on the right side of the road at 5951 Linea del Cielo.
                    <br />
                </p>

            </div><!--end column-->

            <div class="clearfix"></div>

            <div class="column full">
                <div class="hr-t"></div>
                <div class="hr-b"></div>
            </div>
            <div class="column full">
                <h2>VICINITY MAP</h2>
                <div id="gmap">
                    <iframe src="https://maps.google.com/maps/ms?msid=205751736116737027595.0004d416d6aa1647722db&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=32.91418,-116.982422&amp;spn=0.806997,1.167297&amp;z=9&amp;output=embed"></iframe>
                    <br />
                    <small><a href="https://maps.google.com/maps/ms?msid=205751736116737027595.0004d416d6aa1647722db&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=32.91418,-116.982422&amp;spn=0.806997,1.167297&amp;z=9&amp;output=embed" target="_blank">View larger map</a></small>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
        <div style="height: 300px"></div>

    </div> <!-- #main -->
</div> <!-- #main-container -->