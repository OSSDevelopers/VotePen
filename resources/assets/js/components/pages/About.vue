<template>
    <section class="home-wrapper" v-once>
        <nav class="nav has-shadow user-select">
            <div class="container">
                <h1 class="title">
                    {{ Laravel.title }}
                </h1>

                <div class="flex-center">
                    <router-link to="/tos" class="margin-right-1">
                        <el-button round size="medium" type="text">Terms of Service</el-button>
                    </router-link>
                    <router-link to="/privacy-policy" class="margin-right-1">
                        <el-button round size="medium" type="text">Privacy Policy</el-button>
                    </router-link>
                    <router-link to="/credits">
                        <el-button round size="medium" type="text">Credits</el-button>
                    </router-link>
                </div>
            </div>
        </nav>

        <section id="page" class="home-submissions">
            <p>
                We are a small team of developers risen from the world of open-source. We believe in an open and modern Internet.
                VotePen's mission is to give people the power to share their content with not just their friends but the world and interact in real-time.
            </p>
            
            <div class="container-grid margin-top-2">
                <div class="item">
                    <h3>
                        <a href="#" rel="nofollow">
                            <img src="https://cdn.jsdelivr.net/npm/cdn-votepen@1.0.2/landing/about/share.png" alt="Share">
                        </a>
                    </h3>
                    <br>
                    <h2>Share</h2>
                    <div>
                        <p>
                            Anyone can create a channel on nearly any topic imaginable. Each channel is independently moderated by volunteer users. Channel members can share content including stories, links, and images.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <h3>
                        <a href="#" rel="nofollow">
                            <img src="https://cdn.jsdelivr.net/npm/cdn-votepen@1.0.2/landing/about/vote.png" alt="Vote">
                        </a>
                    </h3>
                    <br>
                    <h2>Vote</h2>
                    <div>
                        <p>
                            The global VotePen community votes on which stories and discussions are important by casting upvotes or downvotes. The most interesting, funniest, impactful, or simply amazing stories rise to the top.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <h3>
                        <a href="#" rel="nofollow">
                            <img src="https://cdn.jsdelivr.net/npm/cdn-votepen@1.0.2/landing/about/discuss.png" alt="Discuss">
                        </a>
                    </h3>
                    <br>
                    <h2>Discuss</h2>
                    <div>
                        <p>
                            Users can comment on any post on VotePen. Comments are often the best part about VotePen content—they provide additional information, vigorous discussion, context, and often humor.
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="title">Users are voters</h2>
            <p>
                On VotePen users are in charge. They get to decide what deserves more attention by voting. After all the word "VotePen" means "vote" in German and Spanish.
            </p>

            <br>
            <h2 class="title">Designed for the 21st century</h2>
            <p>
                Thanks to the power of open-source community, VotePen has become the most modern social bookmarking platform on the Internet. It's been developed from scratch to work with latest web technologies such as WebSockets. Voters have full control over their browsing experience. VotePen's UI is highly customizable yet deadly simple.
            </p>
        </section>
    </section>
</template>

<script>
export default {
    data() {
        return {
            Laravel
        };
    }
};
</script>