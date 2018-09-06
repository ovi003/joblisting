=== Jobs for WordPress ===
Contributors: blueglassinteractive
Tags: jobs, structured data, json-ld, microdata, postings, employment
Requires at least: 4.3
Tested up to: 4.9.6
Stable tag: 1.7.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
WordPress plugin for helps easily add job postings to your companys website in a JSON-LD structured way.
 

== Description ==
Jobs for WordPress is a WordPress plugin for easily adding job postings to your company’s website in a structured way. While you can comfortably create and manage job postings in a very user-friendly way, they are also automatically structured with schema.org. Thus, they are technically easy to read for Google and have a high chance of being displayed and ranked well in search results and you can save expensive postings on job platforms.

 
== Features ==
* Add, manage and categorize job listings using the familiar WordPress UI
* Adjust styles of the job postings to your needs with live preview under settings
* Preview of your job listing before it goes live - the preview matches the appearance of a live job listing
* The job listings are automatically formatted with structured data (JSON-LD)
* Job postings are easy to implement via shortcodes or PHP function
* Job postings can be saved in PDF format
* Each listing can be customized with drag-and-drop - in terms of modules, structure, paragraph namings and order, etc.
* Applications can be easily clustered and filtered for a comfortable navigation
* Each listing can be tied to a particular application recipient / e-mail address
* Developer friendly — Custom Post Types, Single job template, a lot of hooks and filters implemented.

 
== Installation ==
 
1. Upload plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use [job-postings] to print jobs listing

== Changelog ==

= 1.7.9 =
* Shortcode [job-postings] options extended. Now showinf child categories in the filer and also possible to show/hide empty categories with parameter.
* Style generator update.
* Translation update.

= 1.7.8 =
* On some WebKit browsers form were unable to submit propperly. This release includes possible fix for form data submition and notification messages.

= 1.7.7 =
* Possible fix for PHP Notice in the log's on line 2511. Related to attachments redirection.

= 1.7.6 =
* Structured data removed from listing shortcodes, to avoid google errors for missing data.

= 1.7.5 =
* Bug fix

= 1.7.4 =
* Added column to the Jobs Category list, to see the category ID.

= 1.7.3 =
* Fix of bug that caused "Thank you" message to not appear after submit on some servers.

= 1.7.2 =
* Small cosmetic bug fix

= 1.7.1 =
* Added anonymous metrics collection

= 1.7.0 =
* Added Checkboxes to the apply now form (Now possible to add GDPR confirmations)
* Added Radio inputs to the apply now form
* New shortcode parameter "category", use as: [job-postings category="1,2"]
* Fixed issue for not showing user inputed data with default apply now form

= 1.6.16 =
* Small appearance issue fixed

= 1.6.15 =
* Made job posting to appear faster on page load
* Fixed translation issue for "Add file" string
* Added new filter "job-modal/add_file_text" to overwrite "Add file" text

= 1.6.14 =
* SVN version issue update

= 1.6.13 =
* Fix of Notice for missing value when it's not filled in posting

= 1.6.12 =
* Fix for flush rewrites that caused a server 500 error on some systems.

= 1.6.11 =
* Apply now settings correction

= 1.6.10 =
* Fixed template redirect issue, finally :)
* Job postings now appear in search. You can use "add_filter( 'jobs_post_type/exclude_from_search', '__return_true', 10, 2);" to exclude job posting from wp default search if needed.

= 1.6.9 =
* Fixed email issue
* Fixed template redirect issue

= 1.6.8 =
* New filter hook "job-entry/disable_featured_image"

= 1.6.7 =
* Maintenance release

= 1.6.6 =
* Maintenance release

= 1.6.5 =
* Fixed bug of "Valid thrue" field.

= 1.6.4 =
* Fixed issue when default "Apply Now" fields were not present in the email.

= 1.6.3 =
* Fixed issue preventing the appearance of Open Graph meta added by Yoast SEO Plugin

= 1.6.2 =
* Removed missing enqueing of modernizer file, used for experimenting.

= 1.6.1 =
* Fixed a bug in Styles setings

= 1.6.0 =
* Fixed the appearance of the uploaded files on the WP default attachment page. Now all new job entry uploads redirect to job posting. All older uploads redirect to homepage as they miss required ID (can be disabled with hook if needed).
* New filter hook "job-entry/noparent_attachment_page_redirect", return true or false, true by default
* New filter hook "job-entry/attachment_page_redirect", return true or false, true by default

= 1.5.10 =
* Recipient email sanitize function update, now allows to use multiple recipients separated by coma

= 1.5.9 =
* Small bug fix

= 1.5.8 =
* Fixed bug that prevented appearance of the Custom Text title in job posting and pdf
* Fixed appearance bug of Base Salary in PDF
* Fixed job featured image positioning

= 1.5.7 =
* Bug fix

= 1.5.6 =
* Added TCPDF files that got missed in latest release

= 1.5.5 =
* Added more templates that can be overriden from the theme: job-preview, job-categories
* Added option to hide Location and/or Employment Type from job preview. Options added to Style setting
* New filter hook "jobs/preview_details", usage: add_filter( 'jobs/preview_details', 'my_jobs_preview_details', 10, 2);
* New filter hook "jobs/preview_details_separator"
* New filter hook "jobs/preview_details_jobLocation"
* New filter hook "jobs/preview_details_employmentType"
* New filter hook "jobs/preview_details"
* New filter hook "jobs/categories_args"
* "Add new position" screen style updates
* Job post sidebar margin corrections

= 1.5.4 =
* Small "Add new position" screen design updates

= 1.5.3 =
* Fixed bug with Custom Button url

= 1.5.2 =
* Added "Name" field for specifiend name of the applicant. Required for better E-mail notifications.
* Adjusted email notifications to include new Entry fields.
* Added logo preview in settings Global options tab.
* Fixed email localisation.
* Fixed bug of validating empty multiple upload field.

= 1.5.1 =
* Fixed bug when tabs in settings dont work

= 1.5.0 =
* Added "Apply now" editor. You can now construct your own apply form.
* Some style corrections

= 1.4.5 =
* Microdata support is removed. Only JSON-LD now and by default.

= 1.4.4 =
* Minor update. jQuery UI style added

= 1.4.2 =
* Minor update. PDF now have smaller gaps between text areas

= 1.4.1 =
* Fixed issue that caused sending of multiple submitions when clicked on submit multiple times.

= 1.4.0 =
* Added category selector for the listing. Use [job-postings showcategory="true" aligncategory="left"] for showing categories above lthe list.
* Added shortcode parameters.
* Updated PDF output.
* Fixed some styling issues that appeared on some theme's

= 1.3.3 =
* Fix for saving pdf on iOS and macOS Safari.

= 1.3.2 =
* Position details display issue fixed.

= 1.3.1 =
* Added button and box roundnes option to the styles settings.
* Added "Custom CSS" area to styles settings, for adding any custom css you need.

= 1.3.0 =
* Added "Styles settings" with live preview. Collors now can be adapted to your needs easily.

= 1.2.8 =
* Readme update.

= 1.2.7 =
* Readme update.

= 1.2.6 =
* Added plugin version to the css and js files to force update cache.

= 1.2.5 =
* CSS typo fix.

= 1.2.4 =
* Added max width for job post. As appeared fullwidth on some themes.

= 1.2.3 =
* Currency symbol positioning fixed

= 1.2.2 =
* Modal appearance fixed

= 1.2.1 =
* Added Base Salary range.
* Loading glitches and short appearing of submit form fixed now.
* New filter added "job-postings/salary-range-separator". To change separater to any desired, if needed.

= 1.2.0 =
* Address field includes now includes "addressLocality", "addressRegion", "postalCode" and "streetAddress". Also shows more details on front end.
* Added "validThrough" field.
* Added "experienceRequirements", "educationRequirements" and "skills" fields.
* Improved Attachment field.
* Added option to replace submit button with "offer ended" text.

= 1.1.9 =
* Added message that visible when no job offers available. Can be changed in settings
* Some styling improvements

= 1.1.8 =
* Fixed language association from WPML

= 1.1.7 =
* Added default notification email to plugin settings
* Added permalink slug to plugin settings

= 1.1.6 =
* Some CSS fixes

= 1.1.5 =
* JSON-LD Updated

= 1.1.4 =
* Enqueueing jQuery

= 1.1.3 =
* Fix for file upload field. Now shows file name propperly

= 1.1.2 =
* Fixed listing shortcode, now printing positions in the right place

= 1.1.1 =
* Added 'jobs-listing/grid_class' filter for changing grid classes of the listing element.

= 1.1.0 =
* Added 'job-entry/after_submit' action for third party software integration and forwarding of submited data.
* Added new field "Button". You can use it for linking job position to third party job listing site or for adding CTA button to you ad.
* Added 'job-entry/notification' and 'job-entry/notification_{POST_ID_HERE}' filter for disabling email notification for all or some specific ad's

= 1.0.1 =
Entry search update

= 1.0.0 =
Initial release



== Upgrade Notice ==
= 1.6.3 =
* Critical bug fix

= 1.6.0 =
* Major update. You should update
* Fixes the entry uploads public appearance

= 1.5.0 =
* As we integrated "Apply now" editor, on all job entries page disapears the applicant data preview (name, email, phone, etc), because of structure change. This field's there now related to the new "Apply now" editor. On entry details page all the data still in place, no worries :)

= 1.3.0 =
* Major update. Added "Styles settings" with live preview.

= 1.1.8 =
Fixed language association from WPML

= 1.1.5 =
JSON-LD Specification updated, should update

= 1.1.4 =
Jquery loaded to frontend, please update if apply now button didnt worked for you

= 1.1.2 =
Should update as maijor fix added

= 1.1.0 =
New features added, should update

= 1.0.1 =
Search is now more accurate, you sould update

= 1.0.0 =
Initial release
 
== FAQ ==

FAQs on how to work with the plugin and where to change settings can be found within the plugin in the section Settings > Help.