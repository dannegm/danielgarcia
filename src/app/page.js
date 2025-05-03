import { TrackClick } from '@/modules/core/components/track-click';
import { cn } from '@/modules/core/helpers/utils';
import Logo from '@/modules/main/components/logo';
import { Section } from '@/modules/main/components/section';
import { Button } from '@/modules/shadcn/ui/button';
import { BookOpenText, Guitar, Hand, Joystick, Piano, Popcorn } from 'lucide-react';

const Home = () => {
    return (
        <main>
            <Section className='flex flex-col pt-16 md:pt-32'>
                <div className='flex flex-row gap-4 items-end mb-8'>
                    <img className='size-32 rounded-2xl shadow' src='/avatare' />
                    <div className='relative max-w-3/5 p-4 bg-gray-100 dark:bg-gray-800 mb-6'>
                        <span className='absolute left-0 -bottom-[20px] block w-0 h-0 border-solid border-t-[20px] border-r-[20px] border-l-0 border-b-0 border-l-transparent border-r-transparent border-t-gray-100 dark:border-t-gray-800 border-b-transparent' />
                        Brand new site!.
                    </div>
                </div>
                <p className='text-sm flex flex-row gap-2 items-center'>
                    <Hand className='size-4 -scale-x-100 -rotate-45' />
                    Hello!, I&apos;m
                </p>

                <Logo className='-ml-0.5'>Daniel García</Logo>

                <h2 className='text-base'>
                    Software Engineer
                    <span className='hidden sm:inline text-gray-500 dark:text-neutral-300'>
                        <span className='mx-1'>/</span>Frontend Heavy
                    </span>
                </h2>

                <p className='mt-4 text-sm text-pretty text-gray-700 dark:text-neutral-400'>
                    I&apos;m a self-taught developer with 12 years of experience in software
                    development. I specialize in web solutions and am continuously growing towards
                    software architecture. Always aiming to innovate, enhance user experience, and
                    experiment with new technologies and trends.
                </p>
                <p
                    className={cn(
                        'mt-4 text-sm text-pretty text-gray-700 dark:text-neutral-400',
                        '[&_svg]:inline-flex [&_svg]:size-4 [&_svg]:-mt-1 [&_svg]:-ml-1',
                    )}
                >
                    Outside of work, I enjoy working on personal projects, including video game
                    development <Joystick />. I also play guitar <Guitar /> and piano <Piano />,
                    love reading <BookOpenText />, and enjoy going to the movies <Popcorn />.
                </p>
            </Section>

            <Section className='flex flex-row gap-2 justify-between items-center'>
                <h2 className='text-sm font-bold'>Resume</h2>
                <nav className='flex flex-row gap-2'>
                    <TrackClick name='download-resume' data={{ type: 'normal' }}>
                        <Button size='sm' variant='secondary' asChild>
                            <a href='/docs/resume.pdf' download>
                                Download
                            </a>
                        </Button>
                    </TrackClick>
                    <TrackClick name='download-resume' data={{ type: 'ats' }}>
                        <Button size='sm' variant='secondary' asChild>
                            <a href='/docs/resume-ats.pdf' download>
                                ATS Friendly
                            </a>
                        </Button>
                    </TrackClick>
                </nav>
            </Section>

            <Section className='flex flex-col gap-2'>
                <h2 className='text-sm font-bold'>Tech Stack</h2>
                <nav className='flex flex-wrap gap-2'>
                    <img
                        alt='Node JS'
                        src='https://img.shields.io/badge/Node.js-43853D?style=for-the-badge&logo=node.js&logoColor=white'
                    />
                    <img
                        alt='Javascript'
                        src='https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black'
                    />
                    <img
                        alt='Typescript'
                        src='https://img.shields.io/badge/TypeScript-007ACC?style=for-the-badge&logo=typescript&logoColor=white'
                    />
                    <img
                        alt='React JS'
                        src='https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB'
                    />
                    <img
                        alt='ReactNative'
                        src='https://img.shields.io/badge/React_Native-20232A?style=for-the-badge&logo=react&logoColor=61DAFB'
                    />
                    <img
                        alt='Redux'
                        src='https://img.shields.io/badge/Redux-593D88?style=for-the-badge&logo=redux&logoColor=white'
                    />
                    <img
                        alt='Vue JS'
                        src='https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D'
                    />
                    <img
                        alt='Next JS'
                        src='https://img.shields.io/badge/NextJS-000000?style=for-the-badge&logo=nextdotjs&logoColor=white'
                    />
                    <img
                        alt='Tailwind'
                        src='https://img.shields.io/badge/Tailwind-38bdf8?style=for-the-badge&logo=tailwind-css&logoColor=white'
                    />
                    <img
                        alt='Unity'
                        src='https://img.shields.io/badge/Unity-100000?style=for-the-badge&logo=unity&logoColor=white'
                    />
                    <img
                        alt='Java'
                        src='https://img.shields.io/badge/Java-ED8B00?style=for-the-badge&logo=java&logoColor=white'
                    />
                    <img
                        alt='Laravel'
                        src='https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white'
                    />
                    <img
                        alt='Go Lang'
                        src='https://img.shields.io/badge/Go-00ADD8?style=for-the-badge&logo=go&logoColor=white'
                    />
                    <img
                        alt='Mongo DB'
                        src='https://img.shields.io/badge/MongoDB-4EA94B?style=for-the-badge&logo=mongodb&logoColor=white'
                    />
                    <img
                        alt='Prisma'
                        src='https://img.shields.io/badge/Prisma-5a67d8?style=for-the-badge&logo=prisma&logoColor=white'
                    />
                    <img
                        alt='Firebase'
                        src='https://img.shields.io/badge/Firebase-1a73e8?style=for-the-badge&logo=firebase&logoColor=white'
                    />
                    <img
                        alt='Supabase'
                        src='https://img.shields.io/badge/Supabase-3ecf8e?style=for-the-badge&logo=supabase&logoColor=white'
                    />
                    <img
                        alt='Google Cloud Platform'
                        src='https://img.shields.io/badge/Google_Cloud-4285F4?style=for-the-badge&logo=google-cloud&logoColor=white'
                    />
                    <img
                        alt='Amazon AWS'
                        src='https://img.shields.io/badge/AWS-232F3E?style=for-the-badge&logo=amazonwebservices&logoColor=white'
                    />
                    <img
                        alt='Vercel'
                        src='https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white'
                    />
                    <img
                        alt='Docker'
                        src='https://img.shields.io/badge/Docker-2496ee?style=for-the-badge&logo=docker&logoColor=white'
                    />
                    <img
                        alt='OpenIA'
                        src='https://img.shields.io/badge/OpenIA-000000?style=for-the-badge&logo=openai&logoColor=white'
                    />
                </nav>
            </Section>

            <Section className='flex flex-row gap-2 justify-between items-center'>
                <h2 className='text-sm font-bold'>
                    <span className='hidden sm:block'>Keep in touch</span>
                    <span className='block sm:hidden'>Socials</span>
                </h2>
                <nav className='flex flex-row gap-2 text-xs *:hover:underline'>
                    <TrackClick name='social' data={{ type: 'github' }}>
                        <a target='_blank' href='https://github.com/dannegm'>
                            Github
                        </a>
                    </TrackClick>
                    <TrackClick name='social' data={{ type: 'linkedin' }}>
                        <a target='_blank' href='https://www.linkedin.com/in/dannegm'>
                            LinkedIn
                        </a>
                    </TrackClick>
                    <TrackClick name='social' data={{ type: 'twitter' }}>
                        <a target='_blank' href='https://twitter.com/dannegm'>
                            Twitter
                        </a>
                    </TrackClick>
                    <TrackClick name='social' data={{ type: 'instagram' }}>
                        <a target='_blank' href='https://www.instagram.com/dannegm'>
                            Instagram
                        </a>
                    </TrackClick>
                </nav>
            </Section>
        </main>
    );
};

export default Home;
