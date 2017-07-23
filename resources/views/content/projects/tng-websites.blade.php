@extends ('layouts.project')

@section ('project-content')

	@include('components.projects.project-highlights', ['items' => [
		'Multi-language, responsive, IE7-compatible websites',
		'Interactive 3D globe using WebGL, SVG, and HTML5 canvas',
		'Interactive 2D map using SVG and CSS3',
		'Support knowledge base with Apache Solr/Lucene and JIRA integration'
	]])

	<h3>TNG Fintech Website</h3>

	<p>Lorem ipsum.</p>

	<h3>TNG Website</h3>

	<p>The TNG Website was the accompanying website for the mobile app. It contained information such as feature details, news and press releases, and a customer support knowledge base and ticket submission system. The website was fully responsive, supported three languages, SEO-optimised, and was compatible with IE7, Android 4.2, and above.</p>

	<p>The centrepiece of the website was the 'Global Transfer' page, an interactive map displaying the countries where the app was supported. Arguably the most complicated part of the website, <span class="highlight">the total page size is only 180 KB</span>. This was achieved by compiling JavaScript using the <a href="https://github.com/google/closure-compiler" target="_blank" rel="noopener noreferrer">Google Closure Compiler</a>, utilizing gzip compression, compressing SVG path instruction data and writing it directly to the page to reduce the number of HTTP requests.</p></p>

	@component('components.projects.project-caption')
		@slot('video', '/videos/projects/tng-websites/tng-websites-video-map')
		@slot('image', '/images/projects/tng-websites/tng-websites-image-map.png')
		@slot('caption', 'An interactive map was built using a multi-layered SVG, JavaScript, and CSS3 transitions &amp; transformations.')
	@endcomponent

	<p>The page was built by producing a multi-layered SVG and dividing a path for each country from the world path. The world path was then stored in the database, along with the path instructions and for each counrty and relevant information.</p>

	<p>CSS selectors and JavaScript event listeners were added to the country paths, with CSS declarations changing SVG attributes such as <code>fill</code> to control the path colours. Panning and scaling was done using CSS <code>transform</code>, namely <code>translate</code> and <code>scale</code>, with the values being calculated by JavaScript. Smooth transitions were achieved by using <code>translateZ</code> for hardware-accelerated transitions and <code>will-change</code> for ahead-of-time browser optimizations.</p>

	<p>A more detailed and technical write-up on the development of the page <a href="{{ $project->url_article }}" target="_blank" rel="noopener noreferrer">can be found here</a>.</p>

	@component('components.projects.project-caption', ['width' => 375])
		@slot('image', '/images/projects/tng-websites/tng-websites-image-mobile.png')
		@slot('caption', 'The mobile layout for the interactive map supports multi-touch panning and pinching to navigate the map.')
	@endcomponent

	<p>The front-page featured a hero section that was reguarly updated for major events or press releases. We mainly used SVGs and CSS3 transitions to create eye-catching and light-weight designs.</p>

	@component('components.projects.project-caption')
		@slot('video', '/videos/projects/tng-websites/tng-websites-video-hero')
		@slot('image', '/images/projects/tng-websites/tng-websites-image-hero.png')
		@slot('caption')
			For the licensing announcement, we drew a <a href="https://en.wikipedia.org/wiki/Guilloch%C3%A9" target="_blank" rel="noopener noreferrer">guilloché pattern</a> in Illustrator, exported it as an SVG, and animated each line with JavaScript and CSS3.
		@endslot
	@endcomponent

	<p>A custom customer support knowledge base was built using Zend, MySQL, and Apache Solr and Lucene. Customers could search for support articles in all languages supported on the website, view related articles and article categories, and submit support tickets.</p>

	@component('components.projects.project-caption')
		@slot('video', '/videos/projects/tng-websites/tng-websites-video-search')
		@slot('image', '/images/projects/tng-websites/tng-websites-image-search.png')
		@slot('caption', 'Using Apache Solr and utilizing Apache Lucene\'s resulted in intelligent keyword and phrase-matching, providing accurate and reliable search results for all three languages used on the website.')
	@endcomponent

	<p>Support ticket submission was integrated with the company's internal JIRA system. Submitting a ticket would automatically create a JIRA ticket with the appropriate details, and provide the customer with an email and in-app notification of their ticket reference number for future follow-up.</p>

	@component('components.projects.project-caption', ['width' => 375])
		@slot('image', '/images/projects/tng-websites/tng-websites-image-ticket.png')
		@slot('caption', 'To reduce ticket submission and increase self-help rates, potentially helpful articles are suggested during support ticket creation both on the website and in the app.')
	@endcomponent

@endsection
