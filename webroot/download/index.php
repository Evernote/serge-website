<?php
    $page = 'download';
    $title = 'Download';

    $head = '
        <script src="/media/vendor/jquery/jquery-2.1.1.min.js"></script>
        <script src="/media/vendor/jquery/jquery.timeago.min.js"></script>

        <style>
            h3 a {
                font-weight: 400;
            }
        </style>
    ';

    include($_SERVER['DOCUMENT_ROOT'] . '/../inc/header.php');
?>

<h1>System Requirements</h1>

<p>Serge can run on any OS with <strong>Perl 5.10 or higher</strong>. Modern Mac OS and Unix systems have Perl already installed. On Windows, we recommend installing <a href="http://strawberryperl.com/">Strawberry Perl</a>.</p>

<p>You also need your favorite <strong>VCS client</strong> (e.g. Git or SVN) to be installed and properly configured for Serge to be able to talk to your remote repositories (but this is not required if you are going to use Serge in a localization-only mode).</p>

<p class="notice">Make sure you have enough permissions to install new software/packages/modules; on Unix, use <code>su</code> or <code>sudo</code>.</p>

<?php /*
<h1>Stable Releases</h1>

<p>Serge, being written in Perl, is published on <a href="http://www.cpan.org/">CPAN</a>. Run the following command to install or upgrade to the latest stable release:</p>

<code class="cli">cpan Serge</code>
*/ ?>

<h1>Installation</h1>

<h2>Step 1. Create a Directory for Serge</h2>

<p>Serge can work in any directory. So create a new directory (we will reference it as <code><em>&lt;serge_root&gt;</em></code> hereafter). For example:</p>

<code class="cli">mkdir ~/serge</code>

<h2>Step 2. Download Sources</h2>

<p>Serge is being actively developed, and its source code is available <a href="https://github.com/evernote/serge">on GitHub</a>. Code in <code>master</code> branch is considered a bleeding edge version; stable releases are marked with <a href="https://github.com/evernote/serge/releases">release tags</a>.</p>

<p>Pick the option that works best for you:</p>

<h3>A. Clone the Repository <a href="https://github.com/evernote/serge"><span id="latest_master_info"></span></a></h3>

<code class="cli">cd <em>&lt;serge_root&gt;</em>
git clone git@github.com:evernote/serge.git
cd serge</code>

<h3>B. Download Latest Stable Snapshot <a href="https://github.com/evernote/serge/releases/latest"><span id="latest_release_info"></span></a></h3>

<code class="cli">cd <em>&lt;serge_root&gt;</em>
wget https://github.com/evernote/serge/archive/<em class="tag_name">&lt;version&gt;</em>.zip -O serge-<em class="tag_name">&lt;version&gt;</em>.zip</span>
unzip serge-<em class="tag_name">&lt;version&gt;</em>.zip
unlink serge-<em class="tag_name">&lt;version&gt;</em>.zip
cd serge-<em class="tag_name">&lt;version&gt;</em></code>

<h2>Step 3. Install Dependencies</h2>

<h3>Step 3.1. Install Prerequisites (Linux Only)</h3>

<p>Some Perl modules that you're about to install in step 3.2 require compiling binaries from sources. If you're on a Linux machine, run your package manager to install build essentials and library headers. For example, on Ubuntu/Debian this will be:</p>

<code class="cli">apt-get -qq update
apt-get -qq -y install build-essential libssl-dev libexpat-dev</code>

<p>If you're on Windows, skip this step and go to 3.2.</p>

<h3>Step 3.2. Install Perl Modules (All Platforms)</h3>

<p>Installing/upgrading dependencies is done with the help of <code>cpanm</code> package manager, which needs to be installed with the following command:</p>

<code class="cli">cpan App::cpanminus</code>

Once you have it installed, run the following command in <code><em>&lt;serge_root&gt;</em>/serge-<em class="tag_name">&lt;version&gt;</em></code> directory:

<code class="cli">cpanm --installdeps .</code>

<h2>Step 4. Make Serge Available from Any Directory</h2>

<p>Under Windows, it is recommended to add the <code><em>&lt;serge_root&gt;</em>/serge-<em class="tag_name">&lt;version&gt;</em>/bin</code> directory to your <code>PATH</code> environment variable.</p>
<p>Under Mac/Linux, the preferred approach is to create a symlink to <code>serge</code> binary:</p>

<code class="cli">ln -s <em>&lt;serge_root&gt;</em>/serge-<em class="tag_name">&lt;version&gt;</em>/bin/serge /usr/bin/serge</code>

<h2>Step 5. Verify the Installation</h2>

<p>Run this command:</p>

<code class="cli">serge</code>

<p>If you see command-line help from Serge, then everything has been set up correctly.</p>

<h2>Step 6. Generate HTML Help</h2>

<p>If you're installing Serge on your development machine, you can take advantage of using HTML help that will open in your browser. Run the following command to generate the HTML version of the help for Serge commands:</p>

<code class="cli">serge gendocs</code>

<p>To test the result, run:</p>

<code class="cli">serge help</code>

<p>This will open a help page in the browser.</p>

<p>Now, <a href="/docs/">get started with Serge workflow and configuration &rarr;</a></p>

<script type="text/javascript">
    $(document).ready(function () {
        var project = 'evernote/serge';

        // update master branch information
        $.getJSON('https://api.github.com/repos/'+project+'/branches/master').done(function (branch) {
            if (branch.commit) {
                $('#latest_master_info').html('(updated ' + $.timeago(branch.commit.commit.committer.date) + ')');
            }
        });

        // update latest release information
        $.getJSON('https://api.github.com/repos/'+project+'/releases/latest').done(function (release) {
            if (release.assets) {
                $('.tag_name').text(release.tag_name.replace(' ', '+'));
                var esc_tag_name = $("<div>").text(release.tag_name).html();
                $('#latest_release_info').html('(version ' + esc_tag_name + ', released ' + $.timeago(release.published_at) + ')');
            }
        });
    });
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/../inc/footer.php') ?>
