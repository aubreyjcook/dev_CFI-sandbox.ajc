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
const { MediaUpload, InnerBlocks, useBlockProps, InspectorControls } =
  wp.blockEditor;
const { Button, TextControl, PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/image-card-top", {
  title: __("Image Card Top", "jsforwphowto"),
  description: __("Make an image and some text pop", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Card", "jsforwphowto")],
  attributes: {
    imgURL: {
      type: "string",
      source: "attribute",
      attribute: "src",
      selector: ".top-card-image img",
    },
    imgID: {
      type: "number",
    },
    imgAlt: {
      type: "string",
      source: "attribute",
      attribute: "alt",
      selector: ".top-card-image img",
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
      attributes: { imgID, imgURL, imgAlt, url, anchor },
      className,
      setAttributes,
      isSelected,
    } = props;
    const blockProps = useBlockProps();
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
    return [
      <InspectorControls>
        <PanelBody>
          <TextControl
            label={__("Image Link", "jsforwphowto")}
            value={url}
            onChange={(url) => setAttributes({ url })}
          />
        </PanelBody>
      </InspectorControls>,
      <>
        <div
          id={anchor}
          className={
            "card white-card-shadow image-card-top mt-3 mb-3 clearfix " +
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
                  {__(" Upload Image", "jsforwphowto")}
                </Button>
              )}
            ></MediaUpload>
          ) : (
            <>
              <div class="wp-block-cover top-card-image border-0">
                <a href={url}>
                  <img
                    loading="lazy"
                    className="wp-block-cover__image-background"
                    alt={imgAlt}
                    src={imgURL}
                    data-object-fit="cover"
                  />
                </a>
              </div>
              {isSelected ? (
                <Button className="remove-image" onClick={onRemoveImage}>
                  {icons.remove}
                </Button>
              ) : null}
            </>
          )}
          <div className="card-info">
            <div {...blockProps}>
              <InnerBlocks />
            </div>
          </div>
        </div>
      </>,
    ];
  },
  save: (props) => {
    const {
      attributes: { className, imgURL, imgAlt, url, anchor },
    } = props;
    const blockProps = useBlockProps.save();
    return (
      <>
        <div
          id={anchor}
          className={
            "card white-card-shadow image-card-top mt-3 mb-3 clearfix " +
            className
          }
        >
          {imgURL && (
            <div className="wp-block-cover top-card-image border-0">
              <a href={url}>
                <img
                  loading="lazy"
                  className="wp-block-cover__image-background"
                  alt={imgAlt}
                  src={imgURL}
                  data-object-fit="cover"
                />
              </a>
            </div>
          )}
          <div className="card-info">
            <div {...blockProps}>
              <InnerBlocks.Content />
            </div>
          </div>
        </div>
      </>
    );
  },
});
