import React from 'react';
import { useHistory } from 'react-router-dom';
import { v4 as uuid } from 'uuid';
import {
    Container,
    Menu,
    Button,
    Icon,
    Image,
    Item,
    Label,
    Pagination,
    Popup,
} from 'semantic-ui-react';

import Galaxy from '@/shared/components/Galaxy';
import { arraySequence } from '@/shared/helpers/arrays';
import useDocumentTitle from '@/shared/hooks/useDocumentTitle';

import {
    Page,
    Background,
    Overlay,
    Content,
    Footer,
    Avatar,
    MenuWrapper,
    TransparentMenu,
} from './Blog.styled';

const paragraph = (
    <Image src='https://react.semantic-ui.com/images/wireframe/short-paragraph.png' />
);

const Home = () => {
    useDocumentTitle('Blog - Daniel García');

    const history = useHistory();

    const sampleArticles = arraySequence(4);

    return (
        <Page>
            <Background>
                <Galaxy />
            </Background>
            <Overlay>
                <Container>
                    <Popup
                        trigger={
                            <Avatar
                                src='https://graph.facebook.com/2800131720206407/picture?type=large'
                                alt='Ir a Inicio'
                                onClick={() => history.push('/')}
                            />
                        }
                        content='Ir a Inicio'
                        position='left center'
                        inverted
                    />
                    <MenuWrapper>
                        <TransparentMenu size='huge' widths={4}>
                            <Menu.Item link>Labs</Menu.Item>
                            <Menu.Item as='a' href='/blog' link active>
                                Blog
                            </Menu.Item>
                            <Menu.Item link>Contact</Menu.Item>
                            <Menu.Item link>About</Menu.Item>
                        </TransparentMenu>
                    </MenuWrapper>
                </Container>

                <Content text>
                    <Item.Group divided>
                        {sampleArticles.map(() => (
                            <Item key={uuid()}>
                                <Item.Image src='https://react.semantic-ui.com/images/wireframe/image.png' />

                                <Item.Content>
                                    <Item.Header as='a'>
                                        Integer posuere erat aliquet.
                                    </Item.Header>
                                    <Item.Meta>
                                        <span className='cinema'>
                                            Vulputate Aenean Ridiculus
                                        </span>
                                    </Item.Meta>
                                    <Item.Description>
                                        {paragraph}
                                    </Item.Description>
                                    <Item.Extra>
                                        <Button
                                            basic
                                            size='mini'
                                            floated='right'
                                        >
                                            Seguir leyendo
                                            <Icon name='right chevron' />
                                        </Button>
                                        <Label icon='globe' content='Tech' />
                                        <Label
                                            icon='globe'
                                            content='Javascript'
                                        />
                                    </Item.Extra>
                                </Item.Content>
                            </Item>
                        ))}
                    </Item.Group>

                    <Pagination
                        activePage={1}
                        boundaryRange={1}
                        siblingRange={1}
                        totalPages={5}
                        ellipsisItem='...'
                        firstItem='⟨'
                        lastItem='⟩'
                        prevItem={null}
                        nextItem={null}
                    />
                </Content>
            </Overlay>
            <Footer>
                <Galaxy />
            </Footer>
        </Page>
    );
};

export default Home;
