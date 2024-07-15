/**
 * Block dependencies
 */
import icon from "./icon";
import icons from "./icons";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InspectorControls } = wp.blockEditor;
const { Button, TextControl, PanelBody } = wp.components;

/**
 * Register example block
 */
export default registerBlockType("jsforwphowto/internal-source", {
  title: __("Internal Source", "jsforwphowto"),
  description: __(
    "Adding a link to any other CFI website with photo.",
    "jsforwphowto"
  ),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [
    __("Link", "jsforwphowto"),
    __("Blog", "jsforwphowto"),
    __("Article", "jsforwphowto"),
  ],
  attributes: {
    imgURL: {
      type: "string",
      source: "attribute",
      attribute: "src",
      selector: ".img-fit img",
    },
    imgID: {
      type: "number",
    },
    imgAlt: {
      type: "string",
      source: "attribute",
      attribute: "alt",
      selector: "a .img-fit",
    },
    sourceName: {
      type: "array",
      source: "children",
      selector: ".internal-source h4",
    },
    title: {
      type: "array",
      source: "children",
      selector: ".internal-source h3",
    },
    date: {
      type: "array",
      source: "children",
      selector: ".internal-source p",
    },
    url: {
      type: "string",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: {
        imgID,
        imgURL,
        imgAlt,
        sourceName,
        title,
        date,
        url,
        anchor,
      },
      className,
      setAttributes,
      isSelected,
    } = props;
    const onSelectImage = (img) => {
      setAttributes({
        imgID: img.id,
        imgURL: img.url,
        imgAlt: img.alt,
      });
    };
    const onRemoveImage = () => {
      setAttributes({
        imgID: null,
        imgURL: null,
        imgAlt: null,
      });
    };
    const onChangeSource = (sourceName) => {
      setAttributes({ sourceName });
    };
    const onChangeTitle = (title) => {
      setAttributes({ title });
    };
    const onChangeDate = (date) => {
      setAttributes({ date });
    };
    return [
      <InspectorControls>
        <PanelBody>
          <TextControl
            label={__("Link", "jsforwphowto")}
            value={url}
            onChange={(url) => setAttributes({ url })}
          />
        </PanelBody>
      </InspectorControls>,
      <div
        id={anchor}
        className={
          "internal-source card wp-block-acf-internal-sources-block " +
          className
        }
      >
        {!imgID ? (
          <MediaUpload
            onSelect={onSelectImage}
            type="image"
            value={imgID}
            render={({ open }) => (
              <Button className={"button button-large"} onClick={open}>
                {icons.upload}
                {__(" Upload Image and set Link in sidebar", "jsforwphowto")}
              </Button>
            )}
          ></MediaUpload>
        ) : (
          <>
            <a href={url} target="_blank" rel="noreferrer noopener">
              <div class="wp-block-cover img-fit card-img-top border-0">
                <img
                  loading="lazy"
                  className="wp-block-cover__image-background"
                  alt={imgAlt}
                  src={imgURL}
                  data-object-fit="cover"
                />
              </div>
            </a>
            {isSelected ? (
              <Button className="remove-image" onClick={onRemoveImage}>
                {icons.remove}
              </Button>
            ) : null}
            <div class="inner-card">
              <RichText
                tagName="h4"
                style={{ color: "#ea5213", fontSize: "1em" }}
                placeholder={__("Source Name", "jsforwphowto")}
                onChange={onChangeSource}
                value={sourceName}
              />
              <a href={url} target="_blank" rel="noreferrer noopener">
                <RichText
                  tagName="h3"
                  placeholder={__("Title", "jsforwphowto")}
                  onChange={onChangeTitle}
                  value={title}
                />
              </a>
              <RichText
                tagName="p"
                placeholder={__(
                  "Date originally posted (optional, month written out)",
                  "jsforwphowto"
                )}
                onChange={onChangeDate}
                value={date}
              />
            </div>
          </>
        )}
      </div>,
    ];
  },
  save: (props) => {
    const { imgURL, imgAlt, className, title, sourceName, date, url, anchor } =
      props.attributes;
    return (
      <div
        id={anchor}
        className={
          "internal-source card wp-block-acf-internal-sources-block " +
          className
        }
      >
        <a href={url} target="_blank" rel="noreferrer noopener">
          <div className="wp-block-cover img-fit card-img-top border-0">
            <img
              loading="lazy"
              className="wp-block-cover__image-background"
              alt={imgAlt}
              src={imgURL}
              data-object-fit="cover"
            />
          </div>
        </a>
        <div className="inner-card">
          <h4>{sourceName}</h4>
          <a href={url} target="_blank" rel="noreferrer noopener">
            <h3>{title}</h3>
          </a>
          <p>{date}</p>
        </div>
      </div>
    );
  },
});
