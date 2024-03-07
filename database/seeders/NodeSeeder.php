<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{
    private array $privacyPolicyBodyParts = [
        "<p>World-Newspapers.com is committed to maintaining your confidence and trust, and accordingly maintains the following privacy policy to protect personal information which you provide online.</p>",
        "<h3>Personal Information</h3>",
        "<p>We do not ask for registration on the site, nor do we keep track of any personal information (name, address, e-mail address) of any visitors to the site.</p>",
        "<p>In some cases, you may voluntarily provide personal information in response to a specific ad or specific requests for information about our site.</p>",
        "<p>We will not disclose any personal information to any third party for any reason. We will never send you any advertisements or unsolicited information about the site.</p>",
        "<h3>Traffic data</h3>",
        "<p>Each time a visitor comes to World-Newspapers.com site, our servers - like most on the Web - collect some basic technical information, including, for example, the visitor&#39;s domain name, referral data, and browser and platform type (e.g., a Netscape browser on a Macintosh platform).</p>",
        "<p>We also count, track and aggregate the visitor&#39;s activity into our analysis of general traffic flows at our site (e.g. tracking where traffic comes from, how traffic flows within the site, etc.). To these ends, we may merge information about visitors and visits into group data, which may then be shared on an aggregated basis with our advertisers; but we will not disclose your individual identity or personally identifiable data without your permission. When we do present aggregated information to outside companies, no one will be able to identify you or contact you.</p>",
        "<h3>Advertising</h3>",
        "<p>World-Newspapers.com works with several companies to deliver ads to the site. Our agreement with such companies specifies that information about our users may only be used to deliver ads on our site. We do not provide any personal information, such as names, postal addresses, phone numbers, or e-mail addresses, to ad companies.</p>",
        "<p>As a result of your visit to our site, ad server companies may collect information such as your domain type, your IP address and clickstream information. For further information, consult the privacy policies of:<br /><a href=\"http://www.usubscribe.com/privacy.cfm\"><b>http://www.usubscribe.com/privacy.cfm</b></a><br /><a href=\"http://cj.com/privacy.asp\"><b>http://cj.com/privacy.asp</b></a></p>",
        "<h3>Use of cookies</h3>",
        "<p>A &quot;cookie&quot; is a small amount of data that is sent to your browser from a Web server and stored on your computer&#39;s hard drive. Cookies can be used for several purposes, but we only use cookies in a limited way. We allow our traffic counter to use cookies to identify the number of unique browsers that visit our sites and to keep track of how many times browsers visit the site.</p>",
        "<p>We can also allow ad companies to use cookies to help serve advertisments. They are just used to help serve ads on the site you are visiting. Cookies cannot be used to identify individuals, only machines, so advertisers will not know who you are. Most web browsers automatically accept cookies, but you can usually change your browser to prevent that use if you desire.</p>",
        "<h3>Disclaimer</h3>",
        "<p>We cannot be responsible for the content of sites that world-newspapers.com links to. If inappropropriate content is added to the site after we have linked to the site please contact us and inform about the linked site.</p>",
        "<p>If you feel that this site is not following its stated information policy, please contact:<br /><img alt=\"\" src=\"/images/attachments/pasto_adresas.jpg\" style=\"width: 214px; height: 35px;\" /></p>"
    ];

    private array $onlineDatingBodyParts = [
        "<p>Dating has never been easy, but the invention of online dating has certainly made it easier than ever before.</p>",
        "<p>The idea of online dating is not new by any stretch of the imagination. Internet dating has been around for over 20 years and its growth has skyrocketed in recent times. In fact, research suggests that 1 in 5 relationships nowadays begin online!</p>",
        "<p>But with every good thing comes a bad &ndash; and online dating has plenty of critics.</p>",
        "<p>It&#39;s getting harder and harder to find someone who has never tried proper online dating. For many single people, it is the first port of call when looking for love. That said, not all online dating sites are created equal &ndash; your choice depends on your needs and what you&#39;re trying to achieve.</p>",
        "<h2>Is Online Dating Right for You?</h2>",
        "<p>Over 80% of single people these days use online dating, and it&#39;s easy to see why. If you&#39;re busy with work or family life, online dating can be a way of widening your social circle without straining yourself. Since your local area is unlikely to provide as many options as an internet-based site, this is the obvious way to go.</p>",
        "<p>The internet is also a great place to meet someone since it&#39;s very easy for people to reveal the truth about themselves online &ndash; many sites ask members for ID before they can join up, so you know you&#39;re chatting with someone serious about finding love.</p>",
        "<h2>5 Signs Online Dating is Right for You</h2>",
        "<h3>1. You&#39;re Shy</h3>",
        "<p>Shyness is one of the biggest barriers to meeting someone new daily, but this doesn&#39;t have to be a problem thanks to online dating services. Some people who wouldn&#39;t dream of going up to a stranger in real life will happily reach out via email or instant messaging &ndash; and this is the perfect way to break the ice.</p>",
        "<h3>2. You&#39;re Busy and Socially Active</h3>",
        "<p>If you&#39;ve got a busy social life and lots of friends, online dating may not be for you &ndash; but that doesn&#39;t mean it&#39;s out of the question entirely. If your schedule is tight but you&#39;d like to expand your friend circle, an online dating site could be a perfect solution. Instead of meeting new people in person, you can expand your contact list with compatible strangers without ever leaving the house!</p>",
        "<h3>3. You Have Limited Options Wherever You Live</h3>",
        "<p>Whether your area is rural, or it&#39;s just not known for attracting lots of desirable singles, internet dating is a great way to widen your circle of potential dates. This is especially true when you think about who else is on the site &ndash; people come from all walks of life, people with similar interests, or even options to explore unconventional relationships like <a href=\"https://www.sugardaddy.com/\">sugar baby dating</a>. It&#39;s not just a case of &#39;local area&#39; matches, so you can expand your pool hugely just by being online.</p>",
        "<h3>4. You&#39;re Overweight</h3>",
        "<p>Research shows that lots of people lose interest in someone if they&#39;re overweight and this can be a tricky barrier to overcome. However, online dating gives you the chance to get your personality across without focusing too much on your looks. This is not about misleading others &ndash; it&#39;s about giving yourself a fair shot at finding love with the right person!</p>",
        "<h3>5. You Have Kids</h3>",
        "<p>Whether you&#39;re a stay-at-home parent or juggling childcare with work, it can be very hard to meet new people. Online dating is the perfect solution to this problem since it can fit around your lifestyle &ndash; there are hundreds of singles looking for love at any one time, so chances are good that someone is waiting to chat!</p>",
        "<h2>5 Signs Online Dating is Not for You</h2>",
        "<h3>1. You&#39;re a Homebody</h3>",
        "<p>In some ways, online dating is the perfect solution to shyness and busy social lives, but if you&#39;re a total homebody then you&#39;d be better off avoiding it. Instead of wasting time on an internet-based site with limited opportunities for new friends, why not try going out more? This will help you expand your social circle more organically, giving you better chances of meeting someone special.</p>",
        "<h3>2. You&#39;re Socially Active but Not Happy With Your Singles Scene</h3>",
        "<p>If you&#39;ve got lots of friends and no problem making conversation with strangers, online dating isn&#39;t right for you &ndash; it&#39;s too passive and there&#39;s not much chance of getting to know someone in a relaxed way. Why not try going out and having fun instead? Attending singles events or joining a sports team will put you in contact with potential matches and it&#39;s less time-consuming than online dating.</p>",
        "<h3>3. You Have No Interest in Marriage</h3>",
        "<p>Some people are happy being single forever, but if you&#39;re actively seeking a long-term relationship with someone you can spend the rest of your life sharing adventures with, online dating isn&#39;t for you. There&#39;s no chance to get to know someone properly in this way since it&#39;s all about quick, easy connections; if you want something real then why not just put yourself out there?</p>",
        "<h3>4. You&#39;re Not Willing to Put in the Work</h3>",
        "<p>Online dating is all about putting in some effort, so if you&#39;re unwilling to write interesting or funny messages or put some serious time into creating a profile that paints an accurate picture of yourself, it probably won&#39;t be worth your while. A lot of people find it fun and rewarding, so if it sounds like a drag then it&#39;s probably not what you&#39;re looking for.</p>",
        "<h3>5. You Get Jealous Too Easily</h3>",
        "<p>Online dating is about meeting lots of people as efficiently as possible, but if you&#39;re the kind of person who can&#39;t even bear to see your partner talking to other people without losing your cool then it&#39;s going to cause problems. You need to be relaxed about the whole thing since there are no guarantees in this game, so if you can&#39;t stay chill when things don&#39;t pan out then it&#39;s probably not right for you.</p>",
        "<h2>The Pros of Online Dating</h2>",
        "<h3>1. It&#39;s Super Convenient</h3>",
        "<p>If you like the idea of meeting lots of singles without having to go out, putting yourself in awkward situations or spending too much time at home, online dating might be perfect for you. You can browse profiles whenever it suits you and chat with people via internet forums or instant messenger apps.</p>",
        "<h3>2. It Can Be Fun</h3>",
        "<p>Lots of people find that browsing through other peoples&#39; profiles is interesting since everyone has their unique attributes and preferences! You also get to see qualifications like whether they smoke, what music they enjoy, and other important lifestyle factors so it&#39;s easier than ever to narrow down your search quickly.</p>",
        "<h3>3. It Lets You Experiment with Different People</h3>",
        "<p>Making friends as an adult can be hard work, but with online dating, you can experiment and chat with lots of different people in a short space of time. You won&#39;t run out of options since there are loads more singles out there just waiting to be discovered, so if one person isn&#39;t right for you then it&#39;s not the end of the world.</p>",
        "<h3>4. It Has Strong Security Features</h3>",
        "<p>You don&#39;t have to worry about meeting strangers when you use an online dating site thanks to strong security features which let you know who is who before they contact you directly! This lets you stay anonymous until everything is sorted out properly, so no one gets hurt or threatened during the process.</p>",
        "<h3>5. You Can Find Love Online</h3>",
        "<p>Research has shown that around 3% of marriages start on internet dating sites, so it&#39;s possible to find the right someone for you. It doesn&#39;t matter if they live across the country or even on another continent &ndash; distance is no match for love!</p>",
        "<h3>6. It Lets You Pick Your Dates</h3>",
        "<p>With online dating, there&#39;s no need to rely on chance encounters and hope that you pick a good partner &ndash; instead, you can see what they look like and check out their interests ahead of time. If you&#39;re not sure, then why not go on a few low-commitment dates and see how things pan out?</p>",
        "<h2>The Downsides of Online Dating</h2>",
        "<h3>1. It Can Get Expensive</h3>",
        "<p>If money isn&#39;t tight then this probably won&#39;t bother you since most sites are free! The paid ones have a lot more people on them, but if you&#39;re strapped for cash then why not try something different?</p>",
        "<h3>2. It&#39;s Time Consuming</h3>",
        "<p>Online dating isn&#39;t a quick fix since it takes a while to get into the swing of things and engage with potential. You might have to wait a while for someone interesting to come along, so if you&#39;re impatient then this probably won&#39;t work out in your favor.</p>",
        "<h3>3. It Comes with Pressure</h3>",
        "<p>If you&#39;ve been single for a long time or maybe just given up hope on love altogether, it can be hard to break out of your shell when there are loads of other singles around who want to chat with you! On the other hand, though, being part of a community lets you make friends and not feel lonely all the time.</p>",
        "<h3>4. You Have to Be Open-Minded</h3>",
        "<p>If you&#39;re a very specific type of person then this might hold you back from finding your perfect match, since there are no guarantees that they&#39;ll be interested in you! If you&#39;re looking for someone to settle down with then it&#39;s worth considering since everyone has different needs and wants even if they seem compatible on paper!</p>",
        "<h3>5. It Creates Problems When Meeting in Person</h3>",
        "<p>The anonymity of internet dating sites can be both a blessing and a curse, which is why it&#39;s important to meet people in person before getting too involved. If you&#39;ve been chatting for months without meeting them then things can go very wrong when finally see what the other person is like in real life.</p>",
        "<h3>6. It&#39;s Easy to Get Stuck In A Rut</h3>",
        "<p>If you&#39;re using online dating without trying anything different then it can be easy to fall into a rut and not meet anyone new! If you don&#39;t want to pay for membership then this might not affect you since there are plenty of people out there just waiting to chat, but if you do then why not try something else?</p>",
        "<h2>Conclusion: Is Online Dating Right for You?</h2>",
        "<p>Online dating is a great way to meet people and so easy to get into since it doesn&#39;t involve any painful social interactions. If you&#39;re looking for love then it&#39;s worth checking out what&#39;s on offer rather than spending your evening alone, but if this isn&#39;t your main aim then why not try something else? Try meeting new people in your area or even taking up a new hobby with others, and before long you&#39;ll be living happily ever after!</p>"
    ];

    private function buildBodyString(array $bodyArray): string
    {
        $bodyString = '';

        for ($i = 0; $i < count($bodyArray); $i++) {
            $bodyString = $bodyString . "\n" . $bodyArray[$i] . "\n";
        }

        return $bodyString;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_nodes')->insert([
            [
                'parent_id' => null,
                'user_id' => 1,
                'type_id' => Type::PAGE,
                'title' => 'About us',
                'slug' => 'about-us',
                'body' => "<p><a href=\"http://www.world-newspapers.com\">World-Newspapers.com</a> was started in 2002. Since then, we are glad to be able to serve everyone who is interested in what is going on around the globe. In the same year, the site was awarded by Reference and User Services Association and added to the list of \"Best Free Reference Web Sites 2002\". This was a great appreciation and acknowledgement of our work.</p>" . "<p><a href=\"http://www.world-newspapers.com\">World-Newspapers.com</a> provides links to thousands of news sources covering every world's country and many of subjects.</p>" . "<p>All listed sites are in English and provide free online content.</p>" . "<p>Though we are trying to be objective, description and selection of sites are based only on our personal opinion.</p>" . "<p>Please note that the contents of sites that world-newspapers.com links to are beyond our control. If inappropriate content is added to the site after we have linked to the site please contact us and inform about the linked site.</p>" . "<p>Also note that linking to other resources does not mean that we support the views of those sites.</p>" . "<p>For more information about this site see Privacy Policy.</p>" . "<p>Please don't hesitate to Contact us with feedback about the site or any questions you may have.</p>",
                'excerpt' => null,
                'status' => 1,
                'mime_type' => null,
                'comment_status' => 1,
                'comment_count' => 0,
                'promote' => false,
                'path' => '/about-us',
                'terms' => null,
                'sticky' => false,
                'left' => 1,
                'right' => 2,
                'visibility_roles' => null,
                'publish_start' => null,
                'publish_end' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'type_id' => Type::PAGE,
                'title' => 'Privacy policy',
                'slug' => 'privacy-policy',
                'body' => $this->buildBodyString($this->privacyPolicyBodyParts),
                'excerpt' => null,
                'status' => 1,
                'mime_type' => null,
                'comment_status' => 1,
                'comment_count' => 0,
                'promote' => false,
                'path' => '/privacy-policy',
                'terms' => null,
                'sticky' => false,
                'left' => 1,
                'right' => 2,
                'visibility_roles' => null,
                'publish_start' => null,
                'publish_end' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'type_id' => Type::BLOG,
                'title' => 'Is Online Dating Right for You?',
                'slug' => 'is-online-dating-right-for-you',
                'body' => $this->buildBodyString($this->onlineDatingBodyParts),
                'excerpt' => "Dating has never been easy, but the invention of online dating has certainly made it easier than ever before. \n\nThe idea of online dating is not new by any stretch of the imagination. Internet dating has been around for over 20 years and its growth has skyrocketed in recent times. In fact, research suggests that 1 in 5 relationships nowadays begin online!",
                'status' => 1,
                'mime_type' => null,
                'comment_status' => 1,
                'comment_count' => 0,
                'promote' => false,
                'path' => '/blogs/is-online-dating-right-for-you',
                'terms' => null,
                'sticky' => false,
                'left' => 3,
                'right' => 4,
                'visibility_roles' => null,
                'publish_start' => null,
                'publish_end' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'type_id' => Type::ATTACHMENT,
                'title' => 'pasto_adresas',
                'slug' => 'pasto_adresas.jpg',
                'body' => null,
                'excerpt' => null,
                'status' => null,
                'mime_type' => 'image/jpeg',
                'comment_status' => 1,
                'comment_count' => 0,
                'promote' => false,
                'path' => '/images/attachments/pasto_adresas.jpg',
                'terms' => null,
                'sticky' => false,
                'left' => 1,
                'right' => 2,
                'visibility_roles' => null,
                'publish_start' => null,
                'publish_end' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
