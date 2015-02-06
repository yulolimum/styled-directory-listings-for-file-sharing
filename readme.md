# Styled Directory Listings :: File Sharing

This is a tiny web app that uses the [Apaxy](http://adamwhitcroft.com/apaxy/) theme to style the directory listings of a file server and presents each file in an HTML wrapper which can be branded with your company logo and colors. Along with an app called [Monosnap](http://monosnap.com/welcome), this can be used as an alternative to Droplr.

There are a couple things to note. This is not a complete Droplr alternative for many reasons. First, you will need to find an app to upload files with; whether it's an FTP client or Monosnap or something else - that's up to you. Second, this does not come with crazy functionality - just a pretty files list and good presentation of individual image and video files (the rest are represented with an icon). Third, it uses Basic HTTP Authentication aka don't upload anything that you're afraid someone unwanted will see. Fourth, this was a weekend project, so it could have been done a bit better. Basically, if you just need to share an image with a client or around the office, this is for you!

---

![http://clrsight.co/yg/020515-2br8w.jpg?+](http://clrsight.co/yg/020515-2br8w.jpg?+)

![http://clrsight.co/yg/020515-vvl2b.jpg?+](http://clrsight.co/yg/020515-vvl2b.jpg?+)

![http://clrsight.co/yg/020515-gyn2a.jpg?+](http://clrsight.co/yg/020515-gyn2a.jpg?+)


---


### Requirements

- A server running Apache(2.0.23+).

- Must be installed in the root of your website application.


### Installation

- Copy the contents of the `build/` folder into the root of your website directory (on most hosts, this is in  `html/`, `public_html/`, or `httpdocs/`).

- Rename the sample users (`/user1/`, `/user2/`, `/user3/`) to whatever you want your actual user folders be named. It's a good idea to leave one untouched so that if you ever need to create more users, you will have a clean folder to just duplicate.

- You will need to get your own Sublime API key for the video playback to work. Go to [https://my.sublimevideo.net/signup](https://my.sublimevideo.net/signup), sign up for a free account, and grab the API key or the entire script tag that looks like this: `<script type="text/javascript" src="//cdn.sublimevideo.net/js/ibvjcopp.js"></script>`. Modify `/theme/views/display.php` to reflect your sublime account.

- Install [Monosnap](http://monosnap.com/welcome) and use the FTP option to store files


### Customization

- Customize the "Display" page colors at the top of the `/theme/stylesheets/style.css` file.

- Add your company logo to `/theme/images/` and link it in the `/theme/layouts/header.html` file.

- Change outbound URLs in the `/theme/layouts/header.html` and `/theme/layouts/footer.html` files.


### Usage

- You can navigate to a user folder to see all of the files belonging to a user (e.g. http://files.mycompany.com/user1)

- If you have not set up a password for your directory, you will be prompted to do so. It's important you set this up or else the world will see your files.

- You can click on a file to see it in a branded HTML wrapper (e.g. http://files.mycompany.com/user1/demo-image.jpg)

- If you want to see the file without the HTML wrapper or want to embed it somewhere, just add `?+` to the end of the URL (e.g. http://files.mycompany.com/user1/demo-image.jpg?+)


### Development

- Pull repo

- Set up a virtual host and point it to the `/build/` folder

- run `gem install bundler` (requires Ruby)

- run `gem install rake` (requires Ruby)

- tweak code within the `./source` directory

- run `rake` to compile changes into `./build`


-----


##### Tags

monosnap, droplr alternative, pretty directory listings, styled directory listings, monosnap storage