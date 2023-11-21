<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeSection;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeSection::insert([
            [
                'section1' => '<h1>Welcome To IdealBet.ONLINE</h1> <p>Unleash Your Winning Potential with Betting Experts Hub. Join Today And Experience The Difference!</p><p><a href="/UserLogin">Sign In</a></p>',
                
                'section2' => '<p>Discover Why We&#39;re Best In The Game!</p><p>&nbsp;</p><p>Best Betting Odds Selected For Races From 16 Different Bookies.!!</p><p>Expert Selections !!</p><p>&nbsp;</p><p>Introduction to the Betting Calculator:</p><p>&nbsp;</p><p>Welcome to the Betting Calculator, your ultimate tool for making informed betting decisions. Whether you&#39;re a seasoned bettor or just starting out, our calculator is designed to empower you with the insights needed to maximize your chances of success.</p><p>&nbsp;</p><p>Show More</p>',
                'section3' => '<p>Introducing Idealbet.Online: Your Gateway to the Best Odds, Predictions and bet Strategy.</p><p><br /><img alt="" src="https://idealbet.online/static/media/bet3.79d0fd48e41b459dd1bc.jpg" /></p><p>Are you tired of being bombarded with flashy advertisements, enticing you to place bets on betting sites that may not always offer the best odds? At Idealbet.Online, we&#39;ve embarked on a mission to empower punters like you by providing access to the highest odds available from over 16 major betting agencies in the marketplace.</p><p>&nbsp;</p>
                <p>In a world where most punters are swayed by media-driven advertising, flocking to websites heavily promoted on TV, we believe it&#39;s essential to shed light on the fact that numerous players in the betting industry offer competitive odds that often go unnoticed.</p> <p>&nbsp;</p>
                <p>How We Operate: At Idealbet.Online, we gather odds data from trusted third-party providers and employ advanced software to sift through this vast array of odds. Our cutting-edge algorithms meticulously select the highest odds, which we then present to you, the punter, in a user-friendly format complemented by our unique tipping predictor. Not only do we handpick potential winning horses, but we also guide you on effective betting strategies.</p><p>&nbsp;</p><p>Show More</p>
                <p><br />&nbsp;</p>',
                'section4' => '<p>Betting Agencies Offering the Best Odds:</p><p><br />
                https://www.bet365.com.au<br />
                https://www.betfair.com.au<br />
                https://www.betnation.com.au<br />
                https://www.betr.com.au<br />
                https://www.betright.com.au<br />
                https://www.bluebet.com.au<br />
                https://www.boombet.com.au<br />
                https://www.colossalbet.com.au<br />
                https://www.ladbrokes.com.au<br />
                https://www.neds.com.au<br />
                https://www.pointsbet.com.au<br />
                https://www.sportsbet.com.au<br />
                https://www.tab.com.au<br />
                https://www.tabtouch.com.au<br />
                https://www.topsport.com.au<br />
                https://www.zbet.com.au</p>
                <p><br />
                &nbsp;</p>',
                'section5' => '<p>Spread The Word!!!</p><p>Sharing this website with others can be incredibly advantageous for every punter. The rationale behind spreading the word lies in the mutual benefits that can be reaped. As more individuals become aware, the betting landscape stands to improve significantly. The underlying principle is that a surge in users will prompt betting agencies to engage in fierce competition, leading them to offer more attractive odds.</p>',
            ],
        ]);
    }
}
