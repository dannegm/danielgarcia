import { cn } from '@/modules/core/helpers/utils';
import { Section } from '@/modules/main/components/section';
import { Button } from '@/modules/shadcn/ui/button';
import { BookOpenText, Guitar, Hand, Joystick, Piano, Popcorn } from 'lucide-react';

const Home = () => {
    return (
        <main>
            <Section className='flex flex-col pt-16 md:pt-32'>
                <img className='size-32 rounded-2xl shadow mb-8' src='/avatare' />
                <p className='text-sm flex flex-row gap-2 items-center'>
                    <Hand className='size-4 -scale-x-100 -rotate-45' />
                    Hello!, I&apos;m
                </p>
                <h1 className='text-4xl tracking-tight -ml-0.5'>Daniel García</h1>
                <h2 className='text-base'>
                    Software Engineer
                    <span className='hidden sm:inline text-gray-500 dark:text-neutral-300'>
                        <span className='mx-1'>/</span>Frontend Heavy
                    </span>
                </h2>

                <p className='mt-4 text-sm text-pretty text-gray-700 dark:text-neutral-400'>
                    I&apos;m a self-taught developer with 12 years of experience in software
                    development. I specialize in web solutions and am continuously growing towards
                    software architecture.
                </p>
                <p
                    className={cn(
                        'mt-2 text-sm text-pretty text-gray-700 dark:text-neutral-400',
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
                    <Button size='sm' variant='secondary' asChild>
                        <a href='/docs/resume.pdf' download>
                            Download
                        </a>
                    </Button>
                    <Button size='sm' variant='secondary' asChild>
                        <a href='/docs/resume-ats.pdf' download>
                            ATS Friendly
                        </a>
                    </Button>
                </nav>
            </Section>

            <Section className='flex flex-row gap-2 justify-between items-center'>
                <h2 className='text-sm font-bold'>Keep in touch</h2>
                <nav className='flex flex-row gap-2 text-xs *:hover:underline'>
                    <a target='_blank' href='https://github.com/dannegm'>
                        Github
                    </a>
                    <a target='_blank' href='https://www.linkedin.com/in/dannegm'>
                        LinkedIn
                    </a>
                    <a target='_blank' href='https://twitter.com/dannegm'>
                        Twitter
                    </a>
                    <a target='_blank' href='https://www.instagram.com/dannegm'>
                        Instagram
                    </a>
                </nav>
            </Section>
        </main>
    );
};

export default Home;
