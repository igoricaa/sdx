<?php $blog = 0;
if (!isset($_GET['blog'])) : ?>
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Blog</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active"><a href="blog-grid-sidebar-left.html">Blog</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="blog-section mb-5 pb-5">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-9 mx-auto">
                    <div class="blog-single-wrapper">
                        <div class="blog-single-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                            <?php
                            $blog = (int)($_GET['blog']);
                            switch ($blog) {
                                case 1:
                                    $img = "/assets/img/blog1.jpg";
                                    $title = "Why modafinil could be the 'smart drug' that changes how we live and work";
                                    break;
                                case 2:
                                    $img = "/assets/img/blog2.jpg";
                                    $title = "Modafinil: The Rise of Smart Drugs X";
                                    break;
                                default:
                                    $img = "/assets/img/blog3.jpg";
                                    $title = "Q&A: Why I Use Modafinil (Provigil)";
                                    $blog = 3;
                            }
                            ?>
                            <img class="img-fluid" src="<?= $img ?>" alt="">
                        </div>
                        <h4 class="post-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="400"><?= $title ?></h4>
                        <div class="para-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                            <?php if ($blog == 1) : ?>

                                <p>So-called "smart drugs" are increasingly being used "off-label" by students and professionals trying to get ahead.</p>
                                <p>It's called modafinil, and it's going to change your life.</p>
                                <p>The drug typically is prescribed to treat narcolepsy, but research shows it's effective for much more than that. In short, it makes people smarter.</p>
                                <p>That is, the drug will sharpen your focus, allowing you to make better decisions and retain more information, deal successfully with new ideas and dexterously handle multitasking.</p>
                                <p>Modafinil will change your life because you soon may feel like you have to take it if you want to keep up with your professional or academic peers.</p>
                                <p>"Modafinil is one of an arsenal of drugs, which includes Adderall, Ritalin and Concerta, that are increasingly used 'off-label' by college students and adults seeking greater productivity."</p>
                                <br>
                                <p><b>How does modafinil work?&nbsp;</b></p>
                                <p>Here's a brief explanation in a study published in the journal European Neuropsychopharmacology: "Modafinil is an FDA-approved eugeroic that directly increases cortical catecholamine levels, indirectly upregulates cerebral serotonin, glutamate, orexin and histamine levels, and indirectly decreases cerebral gamma-amino-butrytic acid levels." The paper's researchers, from Harvard and Oxford universities, reviewed 24 studies about modafinil's effect on users published over 24 years.</p>
                                <p>The trend of "off-label" use of the drug is likely to accelerate, seeing as the researchers found that the side effects are about the same as drinking coffee, though there can be significant negative consequences if it's taken in large doses.</p>
                                <p>UCLA clinical psychiatrist James McGough, who was not part of the European Neuropsychopharmacology study, believes cognitive stimulants such as modafinil offer few dangers for people taking them for reasons beyond their current medically approved uses. He says, simply, "<b>they're safe</b>."</p>
                                <p>And that may end up being the problem. Writes Khazan:</p>
                                <p>"Will we soon be locked in a productivity arms race, pumping out late-night memos with one hand while Googling for the latest smart-drug advancement with the other? Some sports organizations, for what it's worth, already ban the use of these drugs without an ADHD diagnosis for the same reasons they ban steroids and other performance enhancers. Will employer drug tests soon screen for off-label modafinil use? Or on the contrary, will CEOs welcome the rise of extra-sharp workers who never need sleep?"</p>
                                <p>Microsoft co-founder Bill Gates and SpaceX CEO Elon Musk have publicly worried about the potential rise of artificial intelligence -- that computers will make humans obsolete. But a greater risk might be that we become machines ourselves, increasingly immune to basic human needs like downtime. There's already a term for it: "Extreme worker."</p>
                            <?php elseif ($blog == 2) : ?>
                                <p><strong>Modafinil: The Rise of Smart Drugs X</strong></p>
                                <p>The core of biohacking is finding tricks and tools that cause a big impact with very little effort. Call it enlightened laziness or the relentless pursuit for personal perfection, if there is any difference between them. It's time to write about Modafinil, the performance-enhancing smart drug that belongs in your bag of biohacker tricks, at least some of the time. This post shares the experience of several people who use it, including first-time users and an interview with a biomedical engineer who, like me, is a long-time Modafinil user. Read to the end for warnings.</p>
                                <p><strong>What is modafinil?</strong></p>
                                <p>Modafinil is a smart drug, also known as a nootropic. It enhances your cognitive function in a variety of ways (more on that in a second). There are plenty of smart drugs, but modafinil stands in a class of its own for a few reasons:</p>
                                <p>It's not a stimulant. Modafinil acts sort of like a stimulant, but it's actually a eugeroic &ndash; a wakefulness-promoting agent. It doesn't make you speedy or jittery like most classical stimulants do. Modafinil also doesn't have a crash or withdrawal, the way many smart drugs do.It's not addictive. In fact, modafinil can help people kick addictions. It has few to no side effects. Modafinil is very safe. I've hacked my brain with neurofeedback so much that I don't see much of a benefit from modafinil now, but I took it every day for 10 years and saw no problems of any kind with it during that time. It works. Really well.</p>
                                <p>Have you ever seen the movie Limitless with Bradley Cooper? It's based on modafinil. This stuff gives you superhuman mental processing, with few to no downsides.How modafinil enhances your brain and mood.</p>
                                <p>Unlike some smart drugs, there's a good deal of evidence to back up the effects of Modafinil.</p>
                                <p>It has been shown to increase your resistance to fatigue and improve your mood. In healthy adults, modafinil improves &ldquo;fatigue levels, motivation, reaction time and vigilance.&rdquo;&nbsp;</p>
                                <p>A study published by the University of Cambridge found Modafinil to be effective at reducing &ldquo;impulse response&rdquo;, i.e., bad decisions. Modafinil even improves brain function in sleep deprived doctors. There is some evidence Modafinil only helps people with lower IQ, but after years of experimenting (and upgrading my IQ), it doesn't feel that way.</p>
                                <p><strong>Is modafinil safe?</strong></p>
                                <p>Modafinil is not addictive. It has a risk of abuse, however &ndash; some people use it to stay up for way too long, which will probably make you sick.</p>
                                <p><strong>How to dose modafinil?</strong></p>
                                <p>For most healthy people, 30-50 mg of modafinil will be plenty. It lasts 6-8 hours; take it in the morning, with or without food. I should say that modafinil is a prescription drug; you can talk to your doctor about it. There are places you can get it online; I don't want to link to them because of legal issues&hellip;but you may be able to find a source. Biohack responsibly, of course.</p>
                                <p><strong>Alternatives to modafinil</strong></p>
                                <p>Not everyone's game to take a prescription drug for cognition. Racetams and microdoses of nicotine offer similar benefits to modafinil.</p>
                                <p>If you want to play with nootropics but don't want the hassle of talking to a doctor, here's the best online supplier you should check: <u><a href="http://smartdrugsx.com/" target="_blank">smartdrugsx.com</a></u></p>
                            <?php else : ?>
                                <p><strong>Q&amp;A: Why I Use Modafinil (Provigil)<br></strong></p>
                                <p><strong>By Dave Asprey</strong></p>
                                <p>The recent ABC Nightline piece about me using modafinil as a cognitive enhancer brought out a lot of comments.</p>
                                <p>This blog post addresses many of my readers' questions and concerns about modafinil, such as: &ldquo;but Dave, aren't you all-natural?" and, &ldquo;how do you know your experiments worked if you were taking prescription drugs?"</p>
                                <p>Biohacking is about making your biology do what you want by using effective, safe tools, not necessarily about being the most all-natural person out there. It just happens to be that a lot of natural solutions help you reach your potential, and drugs carry their own risks. And when I have done experiments, I take account of the fact I have used modafinil - sometimes I stopped it, sometimes I lowered it, in order to see how my other biohacks work without it.</p>
                                <p>Then there were some readers who wanted to know how much modafinil I take, and more urgently, how to get some (check: <a data-saferedirecturl="https://www.google.com/url?q=http://smartdrugsx.com&source=gmail&ust=1627956483164000&usg=AFQjCNFv0IfH-DbS4myOvg6OWSED-szS5g" href="http://smartdrugsx.com/" rel="noreferrer" style="color: rgb(17, 85, 204);" target="_blank">smartdrugsx.com</a>). Before Bulletproof, I took about 300 - 400 mg per day. When I started the Bulletproof Diet, I reduced my dose to anywhere from 0 - 100 mg of modafinil per day, which I took in the morning or maybe at lunch.</p>
                                <p>And two years after I wrote this post, eight years after I started using modafinil, I quit using modafinil regularly because the Diet and the other brain hacking things I've done have upgraded my performance to the point that modafinil doesn't do as much. I still keep it with me when I travel, but I just don't need it to perform at my best like I used to.</p>
                                <p>Unfortunately, you need to get it through a prescription from your doctor, and they're not all inclined to hand those prescriptions out, even though the medication is pretty low-risk.</p>
                                <p>In this post, I also go into depth explaining what steps I take to mitigate risk from modafinil (even though the chance of risk is slim - about 5 out of 1 million can get a dangerous rash based on a genetic susceptibility to many drugs, including modafinil), and I argue against the claims that it's addictive and immoral. I know these things aren't true, just as I know that on my own I'm good enough, and I also know that by using modafinil, I'm even better.</p>
                                <p>The recent ABC Nightline piece about me using modafinil as a cognitive enhancer brought out a lot of comments.</p>
                                <p>This recent publicity became the first time some followers realized I use smart drugs, even though I have been very public for more than a decade about my use of smart drugs to increase my health and performance, including modafinil. This post is here to answer questions that lots of people are asking about modafinil and smart drugs in general.</p>
                                <p>I've attempted to capture them all here; if I missed one, please comment on this post.</p>
                                <p>Q: &ldquo;<strong>I thought you were all natural and I'm disappointed to hear you use cognitive enhancers."</strong></p>
                                <p>A: This blog - and biohacking in general - is about doing all you can safely do to achieve your biological goals. My goals are to live longer, maximize my potential, and literally radiate energy. Of course I use the smart drugs that are safe, and I believe that modafinil is one of the safe ones for a variety of reasons. If you use a healthy diet, or Tylenol, to get more done, you're doing exactly the same thing as me using smart drugs. The only exception is that Tylenol is more dangerous than most smart drugs, believe it or not (much more toxic to your liver). Many smart drugs (not including modafinil) are neuroprotective and probably extend brain cell life.</p>
                                <p>Q: <strong>How do you know your sleep hacking experiments actually work? You were just hopped up on drugs.</strong></p>
                                <p>A: I went off modafinil for 3 months in the middle of my experiment to see how I did. I was fine, but modafinil is an improvement. When I started taking it, my neurological function was such that modafinil was transformative and amazing. It was a 50% boost at the higher doses prescribed. </p>
                                <p>Modafinil helped me write The Better Baby Book and this blog, all while working full time as a successful executive and raising 2 young children. In fact, in the wake of these comments, I ran another small test. I didn't take any modafinil. Went to sleep at 3 a.m. Woke at 4 a.m. Drove to airport. At 6:30 a.m. I flew from Victoria to Ottowa, arriving at 5:30 p.m. Business dinner until 11 p.m. Slept from 1:00 a.m. to 5:00 a.m. (4 hours). Had Coffee. Sat in meetings for 8 hours straight, awake, with one more coffee. Hopped on a plane back to Victoria (7 hour total journey). No modafinil. I was alert and highly productive in the meetings - this is what vibrant health does for me. But on modafinil, I'd probably have been more alert and energetic. I'd have felt just like I do now - but <u>more</u>.</p>
                                <p>Q: <strong>What dose do you take?</strong></p>
                                <p>A: I took 200 mg in the morning and 100-200 at lunch. The health increases I experienced let me ramp my dose down to 100 mg/day, sometimes 50, and sometimes none. I always perform well if I eat the right foods and avoid the toxins. Modafinil is an added boost, not a requirement.</p>
                                <p>Q: <strong>When do you take it?</strong></p>
                                <p>A: Morning. Maybe at lunch. I never take it at night unless I'm driving and really tired.</p>
                                <p>Q: <strong>Where do you get modafinil?</strong></p>
                                <p>A: <u><a href="http://smartdrugsx.com/" target="_blank">smartdrugsx.com</a></u></p>
                                <p>Q: <strong>How do I get a prescription?</strong></p>
                                <p>A: In the U.S., it is legally prescribed for &ldquo;shift worker sleep disorder" and narcolepsy, and insurance will usually reimburse for it. It is also commonly prescribed for ADD and ADHD, and sometimes for MS, lupus, or chronic fatigue/fibromyalgia. Describe your symptoms to your doctor. Ask for a prescription. The links here may help you fully grasp the symptoms you need to have to qualify for a prescription. (and as a side note, when are we going to decide we don't need $150 permission slips from our doctors to decide what substances we want to put into our own bodies? But I digress ...)</p>
                                <p>Q: <strong>What are the risks and side effects of modafinil?</strong></p>
                                <p>A: Low, non-existent.</p>
                                <p>Q: <strong>Is modafinil a dangerous or addictive?</strong></p>
                                <p>A: Uh, no it &lsquo;s not. Not even in the stimulant category. It's &ldquo;arousal promoting" not stimulating. You can sleep after you take it; it's just that you don't want to. It is not a narcotic. It is not addictive - there is no street value for it. My wife, a Karolinska-trained physician who ran drug and alcohol addiction clinics, flat out says, &ldquo;I've never had an addict ask me for it. It is not addictive." I found I actually decreased my dose as my health improved.</p>
                                <p>Q: <strong>You used it to sleep only 5 hours a night.</strong></p>
                                <p>A: No, I didn't. I slept only 5 hours per night because I had things to do and I was experimenting on myself. I used modafinil to increase my performance during the day after less sleep, but I tested (for 3 months) not using modafinil at all. I programmed myself for more efficient sleep (see podcast with advanced brain monitoring for more details).</p>
                                <p>Q: <strong>It's immoral. If you use it, everyone else will have to.</strong></p>
                                <p>A: No. Only those who want to will take it. Do you drink coffee? Do you use fire to stay warm? Do you use electric lights to out-compete people who have none? How about agriculture? Reading glasses? Technology for human performance is not new.</p>
                                <p>Q: <strong>Do you think you are not good enough without it?</strong></p>
                                <p>This question makes me smile. I used biohacking to get the same brain state as someone who spends 20-40 years in daily zen practice. I am a certified heart math coach and can control my stress consciously, and I know Art of Living breathing and yoga. I *love* myself and know I'm &ldquo;good enough."</p>
                                <p>I also know my potential, and I believe I owe it to myself to do everything within my power to best serve others, including my family, coworkers, the team here at Bulletproof Executive, the thousands of people who have used this site to upgrade their lives, and the many more who keep coming here seeking knowledge. <u>Modafinil helped me do that</u>.</p>
                                <p>What kind of man would I be if I didn't live my life fully? I don't know; that's not who I am. So I will continue to use all methods I can find to maximize my abilities, including electronic, pharmaceutical (selected, safe ones), meditation, occasional exercise, Whole body vibration, supplements...</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="blog-wrapper">
                    <div class="row mb-n6 ">
                        <?php if($blog != 1): ?>
                        <div class="col-xl-4 col-md-6 col-12 mb-6 blog-default-single-item mx-auto">
                            <div class="image-box">
                                <a href="/home/blog?blog=1" class="image-link">
                                    <img class="img-fluid" src="/assets/img/blog1.jpg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="/home/blog?blog=1">Why Modafinil Could Be The 'Smart Drug' That Changes How We Live And Work</a>
                                </h6>
                                <p>DSo-called "smart drugs" are increasingly being used "off-label" by students and professionals trying to get ahead. It's called modafi...</p>
                                <div class="inner">
                                    <a href="/home/blog?blog=1" class="btn btn-dark btn-read-more mx-auto text-dark">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; if($blog != 2): ?>

                        <div class="col-xl-4 col-md-6 col-12 mb-6 blog-default-single-item mx-auto">
                            <div class="image-box">
                                <a href="/home/blog?blog=2" class="image-link">
                                    <img class="img-fluid" src="/assets/img/blog2.jpg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="/home/blog?blog=2">Modafinil: The Rise Of Smart Drugs X</a></h6>
                                <p>The core of biohacking is finding tricks and tools that cause a big impact with very little effort. Call it enlightened laziness or...</p>
                                <div class="inner">
                                    <a href="/home/blog?blog=2" class="btn btn-dark btn-read-more mx-auto text-dark">READ MORE</a>

                                </div>
                            </div>
                        </div>
                        <?php endif; if($blog != 3): ?>
                        <div class="col-xl-4 col-md-6 col-12 mb-6 blog-default-single-item mx-auto">
                            <div class="image-box">
                                <a href="/home/blog?blog=3" class="image-link">
                                    <img class="img-fluid" src="/assets/img/blog3.jpg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="/home/blog?blog=3">Q&A: Why I Use Modafinil (Provigil)</a>
                                </h6>
                                <p>The recent ABC Nightline piece about me using modafinil as a cognitive enhancer brought out a lot of comments. This blog post addres...</p>
                                <div class="inner">
                                    <a href="/home/blog?blog=3" class="btn btn-dark btn-read-more mx-auto text-dark">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>