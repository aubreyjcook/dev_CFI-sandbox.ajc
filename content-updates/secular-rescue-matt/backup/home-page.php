<?php 
/* Template Name: Home Page */
get_header();
?>
    <main id="main" class="col-md-12 site-main" role="main">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); 
                $headline = get_field('headline');
                $mission = get_field('mission_statement');
                $stats = get_field('statistics');
                $stories = get_field('show_success_stories');
                $news = get_field('show_updates');
                $thumbnail = get_the_post_thumbnail_url();
                ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row mission" style="background: url(https://centerforinquiry.org/wp-content/uploads/2019/01/secular-rescue-ladder.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
						<div class="col-12 col-md-6 filler-column"></div>
						<div class="col-12 col-md-6">
							<div class="mission-inner">
								<h2><?php echo $headline; ?></h2>
								<p><?php echo $mission; ?></p>
                				<a href="<?php echo esc_html(home_url('/donate/')); ?>"><button class="btn white-button-on-grey">Help Us Help Others</button></a>&nbsp;&nbsp;
                				<a href="<?php echo esc_html(home_url('/get-help/')); ?>"><button class="btn get-help-button">Get Help</button></a>
							</div>
						</div><!--col-12 col-sm-6-->
					</div><!--row-->
					<?php if(have_rows('statistics')) { ?>
					<!--<div id="statistics" class="row">
						<?php while(have_rows('statistics')) {
							the_row(); 
							$stat_image = get_sub_field('icon');
							$stat_text = get_sub_field('text');
							$stat_image_obj = wp_get_attachment_image_src($stat_image, 'medium'); ?>
							<div class="col-md-6">
								<img src="<?php echo $stat_image_obj[0]; ?>" />
								<h4><?php echo $stat_text; ?></h4>
							</div>
						<?php } ?>
					</div>
					<?php } ?>-->
				
				<!-- Resource Pages -->
				<h3>Resources</h3>
					<div id="news" class="row">
						<?php
						$args = array(
							'post_type' => 'page',
							'post_parent' => 256,
							'posts_per_page' => 3,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						); 
						$resources = new WP_Query($args);
						if($resources->have_posts()) {
							while($resources->have_posts()) {
								$resources->the_post(); 
								$background_image = ( has_post_thumbnail($post->ID) ? wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ) : '' );
								?>
								<div class="col-lg-8 col-xl-4 mb-3">
									<a href="<?php echo get_the_permalink(); ?>"><div class="card">
										<div class="news-image img-fit" style="background-image: url('<?php echo $background_image[0]; ?>');">
										</div>
										<div class="news-info">
											<h4><?php the_title(); ?></h4>
										</div>
									</div></a>
								</div>
							<?php }
						} wp_reset_postdata(); ?>
						
					</div>
					
				<!-- Translations Project -->
					<div class="translations row">
						<div class="col-md-3">
							<img src="https://cdn.centerforinquiry.org/wp-content/uploads/sites/39/2021/04/22214957/translations-project-logo-desktop.png" />
						</div>
						<div class="col-md-9">
							<p>Books such as <en>The Greatest Show on Earth</em>, <em>The Magic of Reality</em>, <em>The Blind Watchmaker</em>, and <em>The God Delusion</em> have been translated by experts into several languages including (but not limited to) Arabic, Urdu, and Farsi, all available free of charge.</p>
							<a href="https://translationsproject.org/"><button class="btn white-button-on-grey">View Books</button></a>
						</div>
					</div>

					<div class="center mb-5">
						<a href="<?php echo esc_html(home_url()); ?>/resources/"><button class="btn white-button-on-grey">View All Resources</button></a>
					</div>

				<!-- Insert Country Data Here -->
				<h3>Blasphemy Around the World</h3>
				<div id="carouselSlides" class="carousel slide row" data-ride="carousel" data-interval="8000" data-pause="hover">
					<ol class="carousel-indicators">
					    <li data-target="#carouselSlides" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselSlides" data-slide-to="1"></li>
					    <li data-target="#carouselSlides" data-slide-to="2"></li>
					    <li data-target="#carouselSlides" data-slide-to="3"></li>
					    <li data-target="#carouselSlides" data-slide-to="4"></li>
					</ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active row">
					      <div class="col-12 col-lg-6 order-2 order-lg-1">
					        <h4>Bangladesh</h4>
					        <ul>
					          <li>
					            Though in theory a secular democracy, the ruling government have frequently given into pressure from Islamist parties, and continue to prosecute atheists and others on malicious charges for “insult to religion” and related crimes.
					          </li>
					          <li>
					            Section 295A of the penal code states that any person who has “deliberate” or malicious” intent to “hurt religious sentiments” can be imprisoned and this has been used in practice to prosecute and imprison atheist and secularist activists.
					          </li>
					          <li>
					            Communal violence and political dysfunction remain significant problems in Bangladesh. In 2013, several atheist and freethought bloggers were the victims of physical assaults, as well as government prosecutions for blasphemy crimes in all but name, with one critic of Islam murdered by machete.
					          </li>
					        </ul>
					      </div>
					      <div class="col-12 col-lg-6 bangledesh-slider-image order-1 order-lg-2"></div>
					    </div>
					    <div class="carousel-item row">
					      <div class="col-12 col-lg-6 order-2 order-lg-1">
					        <h4>Saudi Arabia</h4>
					        <ul>
					          <li>
					            There is no freedom of religion or belief in Saudi Arabia. “Blasphemy” and “insult” to religion can be punished with prison, lashing, or treated as evidence of apostasy, which is punishable by death. Critics of state and religious authorities are harshly suppressed and severely punished.
					          </li>
					          <li>
					            According to Article 1 of the Basic Law of Saudi Arabia (its equivalent to a constitution), “The Kingdom of Saudi Arabia is a sovereign Arab Islamic state with Islam as its religion; God’s Book and the Sunnah of His Prophet (God’s prayers and peace be upon him) are its constitution.”
					          </li>
					          <li>
					            Article 1 of the law defines terrorism as: “Calling for atheist thought in any form, or calling into question the fundamentals of the Islamic religion on which this country is based.”
					          </li>
					        </ul>
					      </div>
					      <div class="col-12 col-lg-6 saudi-slider-image order-1 order-lg-2"></div>
					    </div>
					    <div class="carousel-item row">
					      <div class="col-12 col-lg-6 order-2 order-lg-1">
					        <h4>Pakistan</h4>
					        <ul>
					          <li>
					            Amid wider sectarian and interreligious tension, Pakistan’s harsh blasphemy laws are a serious threat to peace and social stability. “Blasphemy” is punishable by death under law, and accusations often followed by mob brutality with fatal consequences.
					          </li>
					          <li>
					            Chapter XV of Pakistan’s Penal Code outlaws “deliberate and malicious acts intended to outrage religious feelings of any class by insulting its religion or religious beliefs”, defaming of the Quran, insulting remarks about the Prophet Muhammad, and saying anything that had the deliberate intent to wound religious feelings.
					          </li>
					          <li>
					            Dozens of people at remain on death row in Pakistan for blasphemy, and those accused of blasphemy are often murdered before or after any trial takes place.
					          </li>
					        </ul>
					      </div>
					      <div class="col-12 col-lg-6 pakistan-slider-image order-1 order-lg-2"></div>
					    </div>
					    <div class="carousel-item row">
					      <div class="col-12 col-lg-6 order-2 order-lg-1">
					        <h4>Egypt</h4>
					        <ul>
					          <li>
					            After the 2011 “Arab Spring” protests and overthrow of the Morsi government, under the supposedly secular Sisi presidency there has been agitation against young atheists as a “threat to society”, continued marginalisation of religious minorities, and the enthusiastic enforcement of “blasphemy” laws.
					          </li>
					          <li>
					            The Constitution as of January 2014 is an amended version of the 2012 Constitution signed in to law by the Morsi administration. It places Islam at its core whilst only recognising other “Abrahamic” religions as legitimate forms of worship. The Egyptian Criminal Code explicitly outlaws blasphemy.
					          </li>
					        </ul>
					      </div>
					      <div class="col-12 col-lg-6 egypt-slider-image order-1 order-lg-2"></div>
					    </div>
					    <div class="carousel-item row">
					      <div class="col-12 col-lg-6 order-2 order-lg-1">
					        <h4>Morocco</h4>
					        <ul>
					          <li>
					            The King is considered as a direct descendant of the prophet of Islam, which gives the ruling Alaouite dynasty its legitimacy. The constitution (Article 41) designates the King as Commander of the Faithful, he is mandated to ensure the respect of Islam.
					          </li>
					          <li>
					            Criticism of religion, and religious or state authorities, remains a crime that can be and frequently is prosecuted resulting in penal sentences. Many foreign missionaries are declared as a danger and expelled from the country.
					          </li>
					        </ul>
					      </div>
					      <div class="col-12 col-lg-6 morocco-slider-image order-1 order-lg-2"></div>
					    </div>
					  </div>
					</div>

				<!-- End Country Data -->
					<h3>Updates</h3>
					<div id="news" class="row">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 6,
						); 
						$news_posts = new WP_Query($args);
						if($news_posts->have_posts()) {
							while($news_posts->have_posts()) {
								$news_posts->the_post(); 
								$categories = get_the_category();
								?>
								<div class="col-lg-8 col-xl-4 mb-3">
									<a href="<?php echo get_the_permalink(); ?>"><div class="card">
										<div class="news-image img-fit" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
										</div>
										<div class="news-info">
											<h4><?php the_title(); ?></h4>
											<p><?php echo $categories[0]->name; ?></p>
										</div>
									</div></a>
								</div>
							<?php }
						} wp_reset_postdata(); ?>
						
					</div>
					<div class="center mb-5">
						<a href="<?php echo esc_html(home_url()); ?>/stories-and-updates/"><button class="btn white-button-on-grey">View All Updates</button></a>
					</div>
				</article>
            <?php }// endwhile;
        }// endif; ?>
    </main>
<?php
get_footer();
