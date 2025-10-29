# Having trouble sending emails from WordPress?

By default, WordPress sends emails using the wp_mail function, which is based on PHP mail. While this method kind of works “out of the box”, it’s really not reliable and often ends with your emails arriving in the spam folder…or even not sending at all. ([source](https://www.mailpoet.com/blog/wordpress-send-email/))

If you are encountering issue with emails being sent from the website, whether it's from a form submission, or an internal administration notification, the emails may be blocked somewhere along the line by a spam-filter. The best solution for this is to send the email using SMTP instead of the build-in WordPress method.

The method that I've (Paul) used that has always worked, is [SendGrid](https://sendgrid.com/en-us/solutions/email-api). The free tier offers up to 100 emails per day, which is usually plenty for most sites. You will need to create an account and update some DNS settings on the domain. Then, use the WordPress plug-in "[WP Mail SMTP](https://wpmailsmtp.com/)" to link your SendGrid account with your site.

Update Nov. 2026:
Sendgrid no longer has a reliable free tier. Do a google search for free SMTP Services. If hosting on Dreamhost, you can use their SMTP service to send emails (I believe you will only be able to send from an email set up in your dreamhost account).